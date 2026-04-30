<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BlogsModel;
use App\Models\ContactModel;
use App\Models\CheckoutModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new BlogsModel();
        $data = $model->findAll();

        // Load brands and models for car modal
        $brandsModel = new \App\Models\BrandsModel();
        $modelsModel = new \App\Models\ModelsModel();

        $brands = $brandsModel->findAll();
        $models = $modelsModel->findAll();

        // Group models by brand
        $carData = [];
        foreach ($models as $model) {
            $brandId = $model['brand_id'];
            if (!isset($carData[$brandId])) {
                $carData[$brandId] = [];
            }
            $carData[$brandId][] = $model;
        }

        return view('web/index', [
            'blg' => $data,
            'brands' => $brands,
            'carData' => $carData
        ]);
    }



    public function single_blog($id)
    {
        $model = new BlogsModel();
        $blog = $model->find($id);
        $model = new \App\Models\BlogsModel();
        $recentPosts = $model->orderBy('created_at', 'DESC')->findAll(5);


        // echo'<pre>';
        // print_r($data);
        // exit;

        if ($this->request->getMethod() === 'POST') {

            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'phone'    => $this->request->getPost('phone'),
                'message'  => $this->request->getPost('message'),
            ];

            // echo '<pre>';
            // print_r($data);
            // exit;
            $contactM = new ContactModel();

            $contactM->save($data);
            return redirect()->back()->with('success', 'Your message has been sent!');
        }


        return view('web/single_blog', [
            'blog' => $blog,
            'blgg' => $recentPosts
        ]);
    }



    public function services(): string
    {
        return view('web/services');
    }


    public function single_service(): string
    {
        // Load brands and models for car modal
        $brandsModel = new \App\Models\BrandsModel();
        $modelsModel = new \App\Models\ModelsModel();

        $brands = $brandsModel->findAll();
        $models = $modelsModel->findAll();

        // Group models by brand
        $carData = [];
        foreach ($models as $model) {
            $brandId = $model['brand_id'];
            if (!isset($carData[$brandId])) {
                $carData[$brandId] = [];
            }
            $carData[$brandId][] = $model;
        }

        return view('web/single-service', [
            'brands' => $brands,
            'carData' => $carData
        ]);
    }




    public function checkout()
    {
        helper(['form']);
        $session = session();

        // Get model_id from URL (GET) or form submission (POST)
        $modelId = $this->request->getGet('model_id') ?? $this->request->getPost('model_id');

        if (!$modelId) {
            return redirect()->to(base_url('/'))->with('error', 'Please select a car model');
        }

        // Fetch model data from database
        $modelsModel = new \App\Models\ModelsModel();
        $brandsModel = new \App\Models\BrandsModel();

        $carModel = $modelsModel->find($modelId);

        if (!$carModel) {
            return redirect()->to(base_url('/'))->with('error', 'Invalid car model');
        }

        // Get brand details
        $brand = $brandsModel->find($carModel['brand_id']);

        // Handle POST request (form submission)
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username'  => 'required|min_length[3]|max_length[30]',
                'email'     => 'required|valid_email|max_length[150]',
                'phone'     => 'required|regex_match[/^[6-9][0-9]{9}$/]',
                'address'   => 'required|min_length[10]|max_length[255]',
                'message'   => 'permit_empty|max_length[500]'
            ];

            $messages = [
                'username' => [
                    'required'   => 'Full name is required.',
                    'min_length' => 'Full name must be at least 3 characters.',
                    'max_length' => 'Full name cannot exceed 30 characters.'
                ],
                'email' => [
                    'required'    => 'Email address is required.',
                    'valid_email' => 'Please enter a valid email address.',
                    'max_length'  => 'Email address is too long.'
                ],
                'phone' => [
                    'required'    => 'Phone number is required.',
                    'regex_match' => 'Please enter a valid Indian mobile number (10 digits starting with 6, 7, 8, or 9).'
                ],
                'address' => [
                    'required'   => 'Service address is required.',
                    'min_length' => 'Address must be at least 10 characters.',
                    'max_length' => 'Address cannot exceed 255 characters.'
                ],
                'message' => [
                    'max_length' => 'Notes cannot exceed 500 characters.'
                ]
            ];

            if (!$this->validate($rules, $messages)) {
                $session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->to(base_url('checkout?model_id=' . $modelId))->withInput();
            }

            // Prepare data for database (use actual model data from database)
            $checkoutData = [
                'name'              => $this->request->getPost('username'),
                'email'             => $this->request->getPost('email'),
                'phone'             => $this->request->getPost('phone'),
                'service_address'   => $this->request->getPost('address'),
                'additional_notes'  => $this->request->getPost('message'),
                'car_brand'         => $brand['name'],
                'car_model'         => $carModel['name'],
                'car_price'         => '₹' . number_format($carModel['price'], 0),
                'status'            => 'pending'
            ];

            // Save to database
            $checkoutModel = new CheckoutModel();
            $bookingId = $checkoutModel->insert($checkoutData);

            if (!$bookingId) {
                // Get actual validation errors from model
                $modelErrors = $checkoutModel->errors();
                $errorMsg = !empty($modelErrors) ? implode(', ', $modelErrors) : 'Failed to save booking. Please try again.';
                $session->setFlashdata('error', $errorMsg);
                $session->setFlashdata('errors', $modelErrors);
                return redirect()->to(base_url('checkout?model_id=' . $modelId))->withInput();
            }

            // Store booking data in session for thank you page
            $sessionData = [
                'id'        => $bookingId,
                'username'  => $this->request->getPost('username'),
                'email'     => $this->request->getPost('email'),
                'phone'     => $this->request->getPost('phone'),
                'address'   => $this->request->getPost('address'),
                'message'   => $this->request->getPost('message'),
                'car_brand' => $brand['name'],
                'car_model' => $carModel['name'],
                'car_price' => '₹' . number_format($carModel['price'], 0),
            ];

            $session->set('checkout_booking', $sessionData);
            $session->setFlashdata('success', 'Booking confirmed successfully!');

            // Redirect to thank you page
            return redirect()->to(base_url('thankyou'));
        }

        // GET request - display checkout page with car data from database
        return view('web/checkout', [
            'brand' => $brand,
            'model' => $carModel
        ]);
    }

    public function payment()
    {
        $session = session();
        $booking = $session->get('checkout_booking') ?? [];

        return view('web/thankyou', [
            'booking' => $booking
        ]);
    }

    public function thankyou()
    {
        $bookingId = session()->get('last_booking_id');

        if (!$bookingId) {
            return redirect()->to('/');
        }

        $checkoutM = new \App\Models\CheckoutModel();
        $booking   = $checkoutM->find($bookingId);

        if (!$booking) {
            return redirect()->to('/');
        }

        return view('web/thankyou', [
            'booking' => [
                'id'        => $booking['id'],
                'username'  => $booking['name'],
                'phone'     => $booking['phone'],
                'address'   => $booking['service_address'],
                'car_brand' => $booking['car_brand'],
                'car_model' => $booking['car_model'],
                'car_price' => '₹' . number_format($booking['car_price'], 0),
                'message'   => $booking['additional_notes']
            ]
        ]);


        session()->remove('last_booking_id');
    }



    // thank_you Pabitra
    public function thank_you($model)
    {
        echo $model;
    }




    public function downloadBookingPDF()
    {
        $session = session();
        $booking = $session->get('checkout_booking') ?? [];

        if (empty($booking)) {
            return redirect()->to(base_url('/'))->with('error', 'No booking data found!');
        }

        // Generate PDF content
        $pdf = $this->generateSimplePDF($booking);

        // Output PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="Booking_' . ($booking['id'] ?? date('YmdHis')) . '.pdf"');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        header('Content-Length: ' . strlen($pdf));

        echo $pdf;
        exit;
    }

    private function generateSimplePDF($booking)
    {
        // Generate a proper PDF structure
        $pageWidth = 210;  // A4 width in mm
        $pageHeight = 297; // A4 height in mm
        $pageWidthPoints = $pageWidth * 2.834645669;  // Convert to points
        $pageHeightPoints = $pageHeight * 2.834645669;

        // PDF header
        $pdf = "%PDF-1.4\n";
        $pdf .= "%âãÏÓ\n";

        // Create objects array
        $objects = [];
        $objectCount = 0;

        // Object 1: Catalog
        $objectCount++;
        $objects[1] = "1 0 obj\n<< /Type /Catalog /Pages 2 0 R >>\nendobj\n";

        // Object 2: Pages
        $objectCount++;
        $objects[2] = "2 0 obj\n<< /Type /Pages /Kids [3 0 R] /Count 1 >>\nendobj\n";

        // Create page content
        $content = $this->generatePageContent($booking, $pageWidthPoints, $pageHeightPoints);

        // Object 3: Page
        $objectCount++;
        $objects[3] = "3 0 obj\n<< /Type /Page /Parent 2 0 R /Resources << /Font << /F1 4 0 R >> >> /MediaBox [0 0 {$pageWidthPoints} {$pageHeightPoints}] /Contents 5 0 R >>\nendobj\n";

        // Object 4: Font
        $objectCount++;
        $objects[4] = "4 0 obj\n<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>\nendobj\n";

        // Object 5: Content stream
        $contentLength = strlen($content);
        $objectCount++;
        $objects[5] = "5 0 obj\n<< /Length {$contentLength} >>\nstream\n{$content}\nendstream\nendobj\n";

        // Build final PDF
        $output = $pdf;
        $offsets = [];

        foreach ($objects as $num => $obj) {
            $offsets[$num] = strlen($output);
            $output .= $obj;
        }

        // Cross-reference table
        $xrefOffset = strlen($output);
        $output .= "xref\n";
        $output .= "0 " . ($objectCount + 1) . "\n";
        $output .= "0000000000 65535 f \n";

        for ($i = 1; $i <= $objectCount; $i++) {
            $output .= sprintf("%010d 00000 n \n", $offsets[$i]);
        }

        // Trailer
        $output .= "trailer\n";
        $output .= "<< /Size " . ($objectCount + 1) . " /Root 1 0 R >>\n";
        $output .= "startxref\n";
        $output .= "{$xrefOffset}\n";
        $output .= "%%EOF\n";

        return $output;
    }

    private function generatePageContent($booking, $pageWidth, $pageHeight)
    {
        $y = $pageHeight - 60;
        $x = 50;
        $content = '';

        // Green success box background
        $content .= "q\n";
        $content .= "0.0627 0.7255 0.5098 rg\n"; // Green color (16, 185, 129)
        $content .= "50 " . ($y - 80) . " " . ($pageWidth - 100) . " 80 re\n";
        $content .= "f\n";
        $content .= "Q\n";

        // White success text
        $content .= "BT\n";
        $content .= "/F1 28 Tf\n";
        $content .= "1 1 1 rg\n"; // White color
        $content .= "60 " . ($y - 55) . " Td\n";
        $content .= "(Booking Successful!) Tj\n";
        $content .= "0 -20 Td\n";
        $content .= "/F1 12 Tf\n";
        $content .= "(Your booking has been confirmed) Tj\n";
        $content .= "ET\n";

        $y -= 120;

        // Booking Details Card background
        $content .= "q\n";
        $content .= "0.9608 0.9608 0.9608 rg\n"; // Light gray background
        $content .= "50 " . ($y - 380) . " " . ($pageWidth - 100) . " 380 re\n";
        $content .= "f\n";
        $content .= "0.7 0.7 0.7 RG\n"; // Gray border
        $content .= "1 w\n";
        $content .= "50 " . ($y - 380) . " " . ($pageWidth - 100) . " 380 re\n";
        $content .= "S\n";
        $content .= "Q\n";

        // Details heading
        $content .= "BT\n";
        $content .= "/F1 16 Tf\n";
        $content .= "0 0 0 rg\n"; // Black
        $content .= "70 " . ($y - 30) . " Td\n";
        $content .= "(Booking Details) Tj\n";
        $content .= "ET\n";

        $y -= 60;
        $lineHeight = 25;

        // Detail rows
        $details = [
            'Booking ID' => '#' . ($booking['id'] ?? 'N/A'),
            'Customer Name' => $booking['username'] ?? 'N/A',
            'Phone' => $booking['phone'] ?? 'N/A',
            'Email' => $booking['email'] ?? 'N/A',
            'Service Address' => substr($booking['address'] ?? 'N/A', 0, 45),
            'Car Brand' => $booking['car_brand'] ?? 'N/A',
            'Car Model' => $booking['car_model'] ?? 'N/A'
        ];

        $rowCount = 0;
        foreach ($details as $label => $value) {
            // Alternating row backgrounds
            if ($rowCount % 2 == 0) {
                $content .= "q\n";
                $content .= "0.95 0.95 0.95 rg\n";
                $content .= "60 " . ($y - 20) . " " . ($pageWidth - 120) . " 20 re\n";
                $content .= "f\n";
                $content .= "Q\n";
            }

            // Label and value
            $content .= "BT\n";
            $content .= "/F1 11 Tf\n";
            $content .= "0.4 0.4 0.4 rg\n"; // Dark gray for label
            $content .= "70 " . ($y - 15) . " Td\n";
            $content .= "(" . $this->escapePDFText($label) . ") Tj\n";
            $content .= "/F1 10 Tf\n";
            $content .= "0 0 0 rg\n"; // Black for value
            $content .= "200 0 Td\n";
            $content .= "(" . $this->escapePDFText($value) . ") Tj\n";
            $content .= "ET\n";

            $y -= $lineHeight;
            $rowCount++;
        }

        $y -= 20;

        // Purple gradient price section (simulated with color)
        $content .= "q\n";
        $content .= "0.4 0.494 0.918 rg\n"; // Purple color (102, 126, 234)
        $content .= "50 " . ($y - 50) . " " . ($pageWidth - 100) . " 50 re\n";
        $content .= "f\n";
        $content .= "Q\n";

        // Price text - Convert rupee symbol to "Rs."
        $priceText = str_replace('₹', 'Rs. ', $booking['car_price'] ?? '₹0');

        $content .= "BT\n";
        $content .= "/F1 12 Tf\n";
        $content .= "1 1 1 rg\n"; // White
        $content .= "70 " . ($y - 35) . " Td\n";
        $content .= "(Service Price:) Tj\n";
        $content .= "/F1 20 Tf\n";
        $content .= "300 0 Td\n";
        $content .= "(" . $this->escapePDFText($priceText) . ") Tj\n";
        $content .= "ET\n";

        $y -= 80;

        // Footer
        $content .= "BT\n";
        $content .= "/F1 10 Tf\n";
        $content .= "0.3 0.3 0.3 rg\n"; // Dark gray
        $content .= "50 " . ($y - 20) . " Td\n";
        $content .= "(Thank you for choosing A-One Car Polish!) Tj\n";
        $content .= "0 -15 Td\n";
        $content .= "/F1 9 Tf\n";
        $content .= "(Date: " . date('d F Y H:i:s') . ") Tj\n";
        $content .= "ET\n";

        return $content;
    }

    private function escapePDFText($text)
    {
        $text = str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
        return $text;
    }

    public function before_after(): string
    {
        return view('web/before_after_new');
    }

    public function before_after_new(): string
    {
        return view('web/before_after_new');
    }

    public function generate_washed_car(): ResponseInterface
    {
        $apiKey = trim((string) env('huggingface.apiToken'));
        $model = trim((string) env('huggingface.imageModel', 'Qwen/Qwen-Image-Edit'));

        if ($apiKey === '') {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Hugging Face token is not configured. Please set huggingface.apiToken in .env.',
            ]);
        }

        $validationRules = [
            'car_image' => [
                'rules' => 'uploaded[car_image]|max_size[car_image,8192]|mime_in[car_image,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'uploaded' => 'Please upload a car image.',
                    'max_size' => 'The image must be 8MB or smaller.',
                    'mime_in'  => 'Only JPG, PNG, and WEBP files are allowed.',
                ],
            ],
        ];

        if (! $this->validate($validationRules)) {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'message' => $this->validator->getError('car_image') ?: 'Invalid image upload.',
            ]);
        }

        $file = $this->request->getFile('car_image');

        if ($file === null || ! $file->isValid()) {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'message' => 'The uploaded image could not be processed.',
            ]);
        }

        $uploadRoot = FCPATH . 'uploads/washed-car-ai';
        $originalDir = $uploadRoot . '/originals';
        $resultDir = $uploadRoot . '/results';

        if (! is_dir($originalDir)) {
            mkdir($originalDir, 0775, true);
        }

        if (! is_dir($resultDir)) {
            mkdir($resultDir, 0775, true);
        }

        $originalName = $file->getRandomName();
        $file->move($originalDir, $originalName);
        $originalPath = $originalDir . '/' . $originalName;

        $generated = $this->requestWashedCarImage($originalPath, $apiKey, $model);

        if (! $generated['success']) {
            return $this->response->setStatusCode($generated['status'])->setJSON([
                'success' => false,
                'message' => $generated['message'],
            ]);
        }

        $outputName = pathinfo($originalName, PATHINFO_FILENAME) . '-washed.png';
        $outputPath = $resultDir . '/' . $outputName;
        file_put_contents($outputPath, $generated['image_bytes']);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'AI washed-car image generated successfully.',
            'original_url' => base_url('uploads/washed-car-ai/originals/' . $originalName),
            'result_url' => base_url('uploads/washed-car-ai/results/' . $outputName),
        ]);
    }

    private function requestWashedCarImage(string $imagePath, string $apiKey, string $model): array
    {
        $prompt = 'Edit this exact uploaded photo of a real car. Keep the same car, same angle, same background, same framing, same body shape, same color, and same scene. Only make the car look professionally washed, cleaner, glossier, and freshly detailed. Remove dust, mud, stains, and visible exterior grime from the car surface. Do not replace, redesign, or restyle the car. Do not change the background, wheels, lights, windows, number plate, people, or nearby objects. Return a highly photorealistic washed-car result.';
        $negativePrompt = 'different car, changed car design, altered body shape, new background, removed wheels, extra reflections, extra people, extra objects, cartoon, illustration, painting, low quality, blur, distortion';

        $imageBytes = file_get_contents($imagePath);

        if ($imageBytes === false) {
            return [
                'success' => false,
                'status' => 500,
                'message' => 'Could not read the uploaded image.',
            ];
        }

        $payload = [
            'inputs' => base64_encode($imageBytes),
            'parameters' => [
                'prompt' => $prompt,
                'negative_prompt' => $negativePrompt,
                'guidance_scale' => 7.5,
                'num_inference_steps' => 28,
                'target_size' => [
                    'width' => 1024,
                    'height' => 1024,
                ],
            ],
        ];

        $endpoint = 'https://router.huggingface.co/hf-inference/models/' . rawurlencode($model);

        $ch = curl_init($endpoint);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
                'Content-Type: application/json',
            ],
            CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_SLASHES),
            CURLOPT_TIMEOUT => 180,
        ]);

        $rawResponse = curl_exec($ch);
        $curlError = curl_error($ch);
        $statusCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($rawResponse === false) {
            return [
                'success' => false,
                'status' => 502,
                'message' => 'Hugging Face image request failed: ' . $curlError,
            ];
        }

        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE) ?: '';
        $decoded = str_contains($contentType, 'application/json')
            ? json_decode($rawResponse, true)
            : null;

        if ($statusCode >= 400) {
            $message = $decoded['error'] ?? $decoded['message'] ?? 'The AI image API returned an error.';

            return [
                'success' => false,
                'status' => $statusCode,
                'message' => is_string($message) ? $message : 'The AI image API returned an error.',
            ];
        }

        if ($decoded !== null && isset($decoded['error'])) {
            return [
                'success' => false,
                'status' => 502,
                'message' => is_string($decoded['error']) ? $decoded['error'] : 'The image API returned an error payload.',
            ];
        }

        if ($rawResponse === '' || str_contains($contentType, 'application/json')) {
            return [
                'success' => false,
                'status' => 502,
                'message' => 'Hugging Face did not return an image result for this request.',
            ];
        }

        return [
            'success' => true,
            'status' => 200,
            'image_bytes' => $rawResponse,
        ];
    }


    public function contact()
    {
        if ($this->request->getMethod() === 'POST') {

            $data = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'phone'    => $this->request->getPost('phone'),
                'message'  => $this->request->getPost('message'),
            ];

            // echo '<pre>';
            // print_r($data);
            // exit;
            $contactM = new ContactModel();

            $contactM->save($data);
            return redirect()->to(base_url('contact_us'))->with('success', 'Your message has been sent!');
        }

        return view('web/contact_us');
    }





    public function blogs()
    {
        $model = new BlogsModel();
        $data = $model->orderBy('published_on', 'DESC')->findAll();


        return view('web/blogs', ['blg' => $data]);
    }

    public function show($id)
    {
        $model = new BlogsModel();
        $blog = $model->find($id);

        if (!$blog) {
            // Blog not found, show error or redirect
            return redirect()->to('web/blogs')->with('error', 'Blog not found!');
        }

        // Pass blog data to the view
        return view('web/single_blog', ['blog' => $blog]);
    }









    // User Section
    public function login()
    {
        // ✅ Already logged in
        if (session()->has('is_logged') && session('is_logged') == true) {
            return redirect()->route('profile');
        }

        if ($this->request->getMethod() === 'POST') {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new UserModel;

            // 🔍 Find user
            $user = $userModel->where('email', $email)->first();


            // ✅ Check credentials
            if ($user && md5($password, $user['password'])) {

                session()->set([
                    'user_id'   => $user['id'],
                    'email'     => $user['email'],
                    'name'      => $user['name'],
                    'is_logged' => true
                ]);

                return redirect()->route('profile');
            } else {
                // ❌ Generic error (no info leak)
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid email or password');
            }
        }

        return view('web/user/login');
    }


    public function registration()
    {
        if (session()->has('is_logged') && session('is_logged') == true) {
            return redirect()->route('profile');
        }

        if ($this->request->getMethod() === 'POST') {

            if ($this->validate(
                [
                    'full_name'        => 'required|max_length[124]',
                    'email'            => 'required|valid_email|is_unique[users.email]',
                    'password'         => 'required|min_length[6]',
                    'confirm_password' => 'required|matches[password]'
                ],
                [
                    'full_name' => [
                        'required'   => 'Full Name is required',
                        'max_length' => 'Full Name is too long (max 124 characters)'
                    ],

                    'email' => [
                        'required'    => 'Email is required',
                        'valid_email' => 'Enter a valid email address',
                        'is_unique'   => 'This email is already registered'
                    ],

                    'password' => [
                        'required'   => 'Password is required',
                        'min_length' => 'Password must be at least 6 characters'
                    ],

                    'confirm_password' => [
                        'required' => 'Please confirm your password',
                        'matches'  => 'Passwords do not match'
                    ]
                ]
            )) {

                // ✅ Success - Save user
                $data = [
                    'name'     => $this->request->getPost('full_name'),
                    'email'    => $this->request->getPost('email'),
                    'password' => md5($this->request->getPost('password')) // ⚠️ see note below
                ];

                $userModel = new UserModel;
                $userModel->insert($data);

                return redirect()->to('/login')->with('success', 'Registration successful');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }
        }

        // ✅ Default (GET request)
        return view('web/user/registration');
    }



    public function profile()
    {
        if (!session()->has('is_logged') && session('is_logged') == false) {
            return redirect()->route('login');
        } else {
            if ($this->request->getMethod() === 'POST') {





                if ($this->validate(
                    [
                        'full_name'        => 'required|max_length[124]',
                        // 'email' => 'required|valid_email|is_unique[users.email,id,' . session('user_id') . ']',
                        'password'         => 'permit_empty|min_length[6]',
                        'confirm_password' => 'permit_empty|matches[password]'
                    ],
                    [
                        'full_name' => [
                            'required'   => 'Full Name is required',
                            'max_length' => 'Full Name is too long (max 124 characters)'
                        ],
                        // 'email' => [
                        //     'required'    => 'Email is required',
                        //     'valid_email' => 'Enter a valid email address',
                        //     'is_unique'   => 'This email is already registered'
                        // ],

                        'password' => [
                            'required'   => 'Password is required',
                            'min_length' => 'Password must be at least 6 characters'
                        ],

                        'confirm_password' => [
                            'required' => 'Please confirm your password',
                            'matches'  => 'Passwords do not match'
                        ]
                    ]
                )) {

                    // ✅ Success - Save user
                    $data = [
                        'name'     => $this->request->getPost('full_name'),
                        'password' => md5($this->request->getPost('password'), PASSWORD_DEFAULT)
                    ];

                    $userModel = new UserModel();

                    // make sure you have user ID (from session or route)
                    $userId = session()->get('user_id');
                    $userModel->update($userId, $data);

                    session()->set('name', $data['name']);


                    return redirect()->to('/profile')->with('success', 'Profile updated successfully');
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with('errors', $this->validator->getErrors());
                }
            }
            return view('web/user/profile');
        }
    }


    public function profile_logout()
    {
        session()->destroy(); // destroy all session data

        return redirect()->to('/login');
    }
}
