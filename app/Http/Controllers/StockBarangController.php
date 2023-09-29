<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockBarang;
use Illuminate\Support\Facades\Response;
use App\Models\Barang;
use App\Models\CoreSupplier;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

class StockBarangController extends Controller
{
    // public function tampil(){
    //    return view('content.MenuPersediaan.MenuStockBarang');
    // }
    public function tampil(Request $request)
    {

        $barangs = StockBarang::all();


        return view('content.MenuPersediaan.MenuStockBarang', compact('barangs'));
    }


    // export


    public function exportToExcel()
    {
        $barangs = StockBarang::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama Gudang');
        $sheet->setCellValue('C1', 'Kategori Barang');
        $sheet->setCellValue('D1', 'Nama Barang');
        $sheet->setCellValue('E1', 'Satuan Barang');
        $sheet->setCellValue('F1', 'Harga Beli');
        $sheet->setCellValue('G1', 'Harga Jual');
        $sheet->setCellValue('H1', 'Tanggal Stock');

        $row = 2;
        foreach ($barangs as $barang) {
            $sheet->setCellValue('A' . $row, $barang->id);
            $sheet->setCellValue('B' . $row, $barang->nama_gudang);
            $sheet->setCellValue('C' . $row, $barang->kategori_barang);
            $sheet->setCellValue('D' . $row, $barang->nama_barang);
            $sheet->setCellValue('E' . $row, $barang->satuan_barang);
            $sheet->setCellValue('F' . $row, $barang->harga_beli);
            $sheet->setCellValue('G' . $row, $barang->harga_jual);
            $sheet->setCellValue('H' . $row, $barang->tanggal_stock);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'stok_barang.xlsx';
        $writer->save($filename);


        return Response::download($filename);
    }
    public function viewToExcel()
    {
        $barangs = StockBarang::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama Gudang');
        $sheet->setCellValue('C1', 'Kategori Barang');
        $sheet->setCellValue('D1', 'Nama Barang');
        $sheet->setCellValue('E1', 'Satuan Barang');
        $sheet->setCellValue('F1', 'Harga Beli');
        $sheet->setCellValue('G1', 'Harga Jual');
        $sheet->setCellValue('H1', 'Tanggal Stock');

        $row = 2;
        foreach ($barangs as $barang) {
            $sheet->setCellValue('A' . $row, $barang->id);
            $sheet->setCellValue('B' . $row, $barang->nama_gudang);
            $sheet->setCellValue('C' . $row, $barang->kategori_barang);
            $sheet->setCellValue('D' . $row, $barang->nama_barang);
            $sheet->setCellValue('E' . $row, $barang->satuan_barang);
            $sheet->setCellValue('F' . $row, $barang->harga_beli);
            $sheet->setCellValue('G' . $row, $barang->harga_jual);
            $sheet->setCellValue('H' . $row, $barang->tanggal_stock);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'stok_barang.xlsx';
        $writer->save($filename);

        return view('content.MenuPersediaan.ExcelPreview', compact('barangs'));

        // return Response::download($filename);
    }

    public function previewToPDF()
    {
        $barangs = StockBarang::all();

        $pdf = new TCPDF();
        $pdf->SetMargins(10, 10, 10);
        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 10, 'Laporan Stok Barang', 0, 1, 'C');

        // Kode HTML untuk tabel
        $html = '
            <table border="1" style="width:100%;">
                <tr>
                <th width="5%" style="text-align:center">No</th>
                <th width="15%" style="text-align:center">Nama Gudang</th>
                <th width="10%" style="text-align:center">Kategori</th>
                <th width="15%" style="text-align:center">Nama Barang</th>
                <th width="15%" style="text-align:center">Satuan Barang</th>
                <th width="15%" style="text-align:center">Tanggal Stock</th>
                </tr>';

        foreach ($barangs as $val) {
            $html .= '
                <tr>
                    <td style="text-align:center">' . $val['id'] . '</td>
                    <td style="text-align:center">' . $val['nama_gudang'] . '</td>
                    <td style="text-align:center">' . $val['kategori_barang'] . '</td>
                    <td style="text-align:center">' . $val['nama_barang'] . '</td>
                    <td style="text-align:center">' . $val['satuan_barang'] . '</td>
                    <td style="text-align:center">' . date('d/m/Y', strtotime($val['tanggal_stock'])) . '</td>
                    
                </tr>';
        }

        $html .= '
            </table>';


        $pdf->writeHTML($html);

        $pdfContent = $pdf->Output('', 'S');

        return view('content.MenuPersediaan.Pdfview', ['pdfContent' => $pdfContent]);

        // $filename = 'stok_barang.pdf';
        // $pdf->Output($filename, 'D');

    }



    public function tambah()
    {
        
        return view('content.MenuPersediaan.TambahBarang');
    }

    //insert data

    public function tambahsantri()
    {
    }

    public function simpansantri(Request $req)
    {
        $data = $req->all();

        StockBarang::create([
            'nama_gudang' => $data['nama_gudang'],
            'kategori_barang' => $data['kategori_barang'],
            'nama_barang' => $data['nama_barang'],
            'satuan_barang' => $data['satuan_barang'],
            'tanggal_stock' => $req->input('tanggal_stock'),
        ]);

        return redirect()->route('stok')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    //delete

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        $barangs = StockBarang::findOrFail($id);
        $barangs->delete();
        return redirect()->route('stok')->with(['success' => 'Data Berhasil Dihapus']);
    }

    //update
    //update
    public function edit($id)
    {
        $barangs = StockBarang::find($id);
        if (!$barangs) {
            return redirect()->route('stok')->with('error', 'Data not found.');
        }

        return view('content.MenuPersediaan.EditBarang', compact('barangs')); // Ganti 'posts-edit' menjadi 'edit'
    }

    public function update(Request $req, $id)
    {
        $barangs = StockBarang::find($id);
        if (!$barangs) {
            return redirect()->route('stok')->with('error', 'Data not found.');
        }
        $barangs->update([
            'nama_gudang' => $req->input('nama_gudang'),
            'kategori_barang' => $req->input('kategori_barang'),
            'nama_barang' => $req->input('nama_barang'),
            'satuan_barang' => $req->input('satuan_barang'),
            'tanggal_stock' => $req->input('tanggal_stock'),
        ]);
        return redirect()->route('stok')->with('success', 'Data updated successfully.'); // Ganti 'berhasil update.' menjadi 'Data updated successfully.'
    }

    //search
    public function search(Request $r)
    {
        $kategori = $r->input('kategori');
        $tanggal = $r->input('tanggal');

        $query = StockBarang::query();

        if ($kategori) {
            $query->where('kategori_barang', $kategori);
        }

        if ($tanggal) {
            $query->whereDate('tanggal_stock', $tanggal);
        }

        $barangs = $query->get();

        return view('content.MenuPersediaan.MenuStockBarang', compact('barangs'));
    }
}
