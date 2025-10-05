<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LicenseSettingController extends Controller 
{
    public function index()
    {
        $settings_data = DB::table('tbl_settings')->first();
        
        return view('license_setting.list', compact('settings_data'));
    }

    /**
     * Send OTP for license reset
     */
    public function sendLicenseOtp(Request $request)
    {
        try {

              // Check if domain is localhost
            $domain_name = $_SERVER['SERVER_NAME'];
            if (in_array(strtolower($domain_name), ['localhost', '127.0.0.1', '::1']) || 
                strpos(strtolower($domain_name), 'localhost') !== false) {
                return response()->json([
                    'error' => true,
                    'message' => 'License cannot be reset on localhost domain. Please use a live domain.'
                ], 400);
            }

            $request->validate([
                'email' => 'required|email',
                'pkey' => 'required',
            ]);

            $email = $request->email;
            $pkey = $request->pkey;
          
            // Call external API
            $response = Http::timeout(30)->post('https://license.dasinfomedia.com/admin/api/license/send-otp', [
                'email' => $email,
                'pkey' => $pkey,
            ]);
          
            // Check if request was successful
            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['error']) && $data['error'] === false) {
                    // Store email in session for verification step
                    Session::put('license_reset_email', $email);
                    Session::put('license_reset_pkey', $pkey);
                    
                    return response()->json([
                        'error' => false,
                        'message' => $data['message'] ?? 'OTP sent to your email successfully'
                    ]);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => $data['message'] ?? 'Failed to send OTP'
                    ]);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed to connect to license server. Please contact us at sales@mojoomla.com.'
                ], 500);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => 'Validation failed: ' . implode(', ', $e->validator->errors()->all())
            ], 422);
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return response()->json([
                'error' => true,
                'message' => 'Network error: Unable to connect to license server'
            ], 500);
        } catch (\Exception $e) {
            \Log::error('License OTP Send Error: ' . $e->getMessage());
            
            return response()->json([
                'error' => true,
                'message' => 'An unexpected error occurred. Please try again.'
            ], 500);
        }
    }

    /**
     * Verify OTP for license reset
     */
    public function verifyLicenseOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'otp' => 'required|digits:6',
            ]);

            $email = $request->email;
            $otp = $request->otp;
            $pkey = Session::get('license_reset_pkey');
            // Verify email matches the one from send OTP step
            if (Session::get('license_reset_email') !== $email) {
                return response()->json([
                    'error' => true,
                    'message' => 'Email mismatch. Please start the process again.'
                ], 400);
            }

            // Call external API
            $response = Http::timeout(30)->post('https://license.dasinfomedia.com/admin/api/license/verify-otp', [
                'email' => $email,
                'otp' => $otp,
                'pkey' => $pkey,
            ]);

            // Check if request was successful
            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['error']) && $data['error'] === false) {
                    // Clear session data
                    Session::forget('license_reset_email');
                    
                    // Log the license reset action
                    \Log::info('License reset successful for email: ' . $email);
                    
                    return response()->json([
                        'error' => false,
                        'message' => $data['message'] ?? 'License has been reset successfully'
                    ]);
                } else {
                    return response()->json([
                        'error' => true,
                        'message' => $data['message'] ?? 'Invalid or expired OTP'
                    ]);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed to connect to license server. Please try again later.'
                ], 500);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => 'Validation failed: ' . implode(', ', $e->validator->errors()->all())
            ], 422);
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return response()->json([
                'error' => true,
                'message' => 'Network error: Unable to connect to license server'
            ], 500);
        } catch (\Exception $e) {
            \Log::error('License OTP Verify Error: ' . $e->getMessage());
            
            return response()->json([
                'error' => true,
                'message' => 'An unexpected error occurred. Please try again.'
            ], 500);
        }
    }

}