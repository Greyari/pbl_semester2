<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merek;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data_merek()
    {
        $client = new Client;
        $url = "http://localhost:8000/api/merek";
        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('admin.merek', ['data'=>$data]);
    }


    public function tambah_merek(Request $request)
    {
        $nama_merek = $request->nama_merek;
        $gambar = $request->file('gambar');

        $client = new Client();
        $url = "http://localhost:8000/api/tambah_merek";

        // Membuat form data untuk mengirimkan file gambar
        $formData = [
            'multipart' => [
                [
                    'name' => 'nama_merek',
                    'contents' => $nama_merek,
                ],
                [
                    'name' => 'gambar',
                    'contents' => fopen($gambar->getPathname(), 'r'),
                    'filename' => $gambar->getClientOriginalName(),
                ],
            ],
        ];

        try {
            $response = $client->request('POST', $url, $formData);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            if ($contentArray['status'] !== true) {
                $error = $contentArray['message'];
                $errorDetail = $contentArray['errors'] ?? [];

                // Membuat array pesan error yang lebih spesifik
                $errorMessages = [];
                foreach ($errorDetail as $field => $messages) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }

                return redirect()->back()->with('error', $error)->with('errorMessages', $errorMessages)->withInput();
            } else {
                return redirect()->back()->with('success', 'Merek berhasil ditambahkan!');
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response ? $response->getStatusCode() : 'No response';

            if ($response) {
                $content = $response->getBody()->getContents();
                $contentArray = json_decode($content, true);
                $error = $contentArray['message'] ?? 'Gagal menambahkan merek';
                $errorDetail = $contentArray['errors'] ?? [];

                $errorMessages = [];
                foreach ($errorDetail as $field => $messages) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }
            } else {
                $error = 'Gagal menambahkan merek';
                $errorMessages = [$e->getMessage()];
            }

            return redirect()->back()->with('error', "$error (Status code: $statusCode)")->with('errorMessages', $errorMessages)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan merek: ' . $e->getMessage())->withInput();
        }
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_merek' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Temukan merek berdasarkan ID
        $merek = Merek::find($id);
        if (!$merek) {
            return redirect()->back()->with('error', 'Merek tidak ditemukan.');
        }

        // Update data merek
        $merek->nama_merek = $request->nama_merek;

        // Penanganan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('images', 'public');

            if ($merek->gambar) {
                Storage::disk('public')->delete($merek->gambar);
            }

            $merek->gambar = $path;
        }

        // Simpan perubahan
        $merek->save();

        // Kirim permintaan ke API untuk sinkronisasi
        $client = new Client();
        $url = "http://localhost:8000/api/update_merek/$id";

        $formData = [
            'multipart' => [
                [
                    'name' => 'nama',
                    'contents' => $request->nama_merek,
                ],
            ],
        ];

        if ($request->hasFile('gambar')) {
            $formData['multipart'][] = [
                'name' => 'gambar',
                'contents' => fopen($file->getPathname(), 'r'),
                'filename' => $file->getClientOriginalName(),
            ];
        }

        try {
            $response = $client->request('PUT', $url, $formData);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            if ($contentArray['status'] !== true) {
                $error = $contentArray['message'];
                $errorDetail = $contentArray['errors'] ?? [];

                $errorMessages = [];
                foreach ($errorDetail as $field => $messages) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }

                return redirect()->back()->with('error', $error)->with('errorMessages', $errorMessages)->withInput();
            } else {
                return redirect()->back()->with('success', 'Merek berhasil diperbarui!');
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response ? $response->getStatusCode() : 'No response';

            if ($response) {
                $content = $response->getBody()->getContents();
                $contentArray = json_decode($content, true);
                $error = $contentArray['message'] ?? 'Gagal memperbarui merek';
                $errorDetail = $contentArray['errors'] ?? [];

                $errorMessages = [];
                foreach ($errorDetail as $field => $messages) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }
            } else {
                $error = 'Gagal memperbarui merek';
                $errorMessages = [$e->getMessage()];
            }

            return redirect()->back()->with('error', "$error (Status code: $statusCode)")->with('errorMessages', $errorMessages)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui merek: ' . $e->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/hapus_merek/$id";

        try {
            $response = $client->request('DELETE', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            if ($contentArray['status'] !== true) {
                $error = $contentArray['message'];
                return redirect()->back()->with('error', $error);
            } else {
                return redirect()->back()->with('success', 'Merek berhasil dihapus!');
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response ? $response->getStatusCode() : 'No response';
            $error = 'Gagal menghapus merek';

            if ($response) {
                $content = $response->getBody()->getContents();
                $contentArray = json_decode($content, true);
                $error = $contentArray['message'] ?? $error;
            }

            return redirect()->back()->with('error', "$error (Status code: $statusCode)");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus merek: ' . $e->getMessage());
        }
    }
}
