<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merek;
use App\Models\Produk;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        $client = new Client;
        $merek = Merek::all();
        $url = "http://localhost:8000/api/produk";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('admin.produk', ['data' => $data, 'merek'=>$merek]);
    }

    public function tambah_produk(Request $request)
    {
        $merek = $request->id_merek;
        $nama = $request->nama;
        $harga = $request->harga;
        $stok = $request->stok;
        $deskripsi = $request->deskripsi;
        $gambar = $request->file('gambar');

        $client = new Client();
        $url = "http://localhost:8000/api/tambah_produk";

        // Membuat form data untuk mengirimkan file gambar
        $formData = [
            'multipart' => [
                [
                    'name' => 'nama',
                    'contents' => $nama,
                ],
                [
                    'name' => 'id_merek',
                    'contents' => $merek,
                ],
                [
                    'name' => 'deskripsi',
                    'contents' => $deskripsi,
                ],
                [
                    'name' => 'harga',
                    'contents' => $harga,
                ],
                [
                    'name' => 'stok',
                    'contents' => $stok,
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
                return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response ? $response->getStatusCode() : 'No response';

            if ($response) {
                $content = $response->getBody()->getContents();
                $contentArray = json_decode($content, true);
                $error = $contentArray['message'] ?? 'Gagal menambahkan produk';
                $errorDetail = $contentArray['errors'] ?? [];

                $errorMessages = [];
                foreach ($errorDetail as $field => $messages) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }
            } else {
                $error = 'Gagal menambahkan produk';
                $errorMessages = [$e->getMessage()];
            }

            return redirect()->back()->with('error', "$error (Status code: $statusCode)")->with('errorMessages', $errorMessages)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage())->withInput();
        }
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'id_merek' => 'required|exists:merek,id',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Temukan produk berdasarkan ID
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Update data produk
        $produk->nama = $request->nama;
        $produk->id_merek = $request->id_merek;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        // Penanganan gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('images', 'public');

            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $produk->gambar = $path;
        }

        // Simpan perubahan
        $produk->save();

        // Kirim permintaan ke API untuk sinkronisasi
        $client = new Client();
        $url = "http://localhost:8000/api/update_produk/$id";

        $formData = [
            'multipart' => [
                [
                    'name' => 'nama',
                    'contents' => $request->nama,
                ],
                [
                    'name' => 'id_merek',
                    'contents' => $request->id_merek,
                ],
                [
                    'name' => 'deskripsi',
                    'contents' => $request->deskripsi,
                ],
                [
                    'name' => 'harga',
                    'contents' => $request->harga,
                ],
                [
                    'name' => 'stok',
                    'contents' => $request->stok,
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
                return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response ? $response->getStatusCode() : 'No response';

            if ($response) {
                $content = $response->getBody()->getContents();
                $contentArray = json_decode($content, true);
                $error = $contentArray['message'] ?? 'Gagal memperbarui produk';
                $errorDetail = $contentArray['errors'] ?? [];

                $errorMessages = [];
                foreach ($errorDetail as $field => $messages) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }
            } else {
                $error = 'Gagal memperbarui produk';
                $errorMessages = [$e->getMessage()];
            }

            return redirect()->back()->with('error', "$error (Status code: $statusCode)")->with('errorMessages', $errorMessages)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui produk: ' . $e->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/hapus_produk/$id";

        try {
            $response = $client->request('DELETE', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            if ($contentArray['status'] !== true) {
                $error = $contentArray['message'];
                return redirect()->back()->with('error', $error);
            } else {
                return redirect()->back()->with('success', 'Produk berhasil dihapus!');
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $statusCode = $response ? $response->getStatusCode() : 'No response';
            $error = 'Gagal menghapus produk';

            if ($response) {
                $content = $response->getBody()->getContents();
                $contentArray = json_decode($content, true);
                $error = $contentArray['message'] ?? $error;
            }

            return redirect()->back()->with('error', "$error (Status code: $statusCode)");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }

}
