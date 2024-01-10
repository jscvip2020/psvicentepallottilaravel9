<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doacaos = Doacao::all();
        return view('back.doacao.index', compact('doacaos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'imgtopo' => 'nullable|image|mimes:JPG,JPEG,jpeg,jpg,png|dimensions:ratio=4/1',
            'qrcode' => 'nullable|image|mimes:JPG,JPEG,jpeg,jpg,png|dimensions:ratio=1/1',
            'banco' => 'nullable|min:5',
            'agencia' => 'nullable|min:5|required_unless:banco,null',
            'conta' => 'nullable|min:5|required_unless:banco,null',
            'cnpj' => 'nullable|cnpj',
        ]);

        if ($request->file('imgtopo')) {
            $fileImgTopo = $request->file('imgtopo');
            $nameImgtopo = "topodoacao." . $fileImgTopo->extension();
            $imgtopo = Storage::putFileAs('dizimo', $request->file('imgtopo'), $nameImgtopo);
            if ($imgtopo) {
                $imagemTopoText = "\n Imagem do topo Gravada com sucesso!";
            } else {
                $imagemTopoText = "\n Imagem do topo não foi Gravada!";
            }
        } else {
            $nameImgtopo = "";
            $imagemTopoText = "";
        }

        if ($request->file('qrcode')) {
            $fileQrcode = $request->file('qrcode');
            $nameQrcode = "qrCodeDoacao." . $fileQrcode->extension();
            $qrcode = Storage::putFileAs('dizimo', $request->file('qrcode'), $nameQrcode);
            if ($qrcode) {
                $QrCodeText = "\n QrCode Gravado com sucesso!";
            } else {
                $QrCodeText = "\n QrCode não foi Gravado!";
            }
        } else {
            $nameQrcode = "";
            $QrCodeText = "";
        }

        $action = Doacao::create([
            'imgtopo' => $nameImgtopo,
            'qrcode' => $nameQrcode,
            'banco' => $request->banco,
            'agencia' => $request->agencia,
            'conta' => $request->conta,
            'cnpj' => $request->cnpj,
        ]);
        if ($action) {
            return redirect()->route('doacao.index')->with('success', 'Doação inserido com sucesso!' . $imagemTopoText . $QrCodeText);
        } else {
            return redirect()->route('doacao.index')->with('error', 'Doação não pode ser Inserido!' . $imagemTopoText . $QrCodeText);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doacao $doacao)
    {
        $doacaos = Doacao::All();
        return view('back.doacao.index', compact(['doacao', 'doacaos']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doacao $doacao)
    {
        $validado = $request->validate([
            'imgtopo' => 'nullable|image|mimes:JPG,JPEG,jpeg,jpg,png|dimensions:ratio=4/1',
            'qrcode' => 'nullable|image|mimes:JPG,JPEG,jpeg,jpg,png|dimensions:ratio=1/1',
            'banco' => 'nullable|min:5',
            'agencia' => 'nullable|min:5|required_unless:banco,null',
            'conta' => 'nullable|min:5|required_unless:banco,null',
            'cnpj' => 'nullable|cnpj',
        ]);

        if ($request->file('imgtopo')) {
            $fileImgTopo = $request->file('imgtopo');
            $nameImgtopo = "topodoacao." . $fileImgTopo->extension();
            $imgtopo = Storage::putFileAs('dizimo', $request->file('imgtopo'), $nameImgtopo);
            if ($imgtopo) {
                $doacao->update(['imgtopo' => $nameImgtopo,]);
                $imagemTopoText = "\n Imagem do topo Gravada com sucesso!";
            } else {
                $imagemTopoText = "\n Imagem do topo não foi Gravada!";
            }
        } else {
            $imagemTopoText = "";
        }

        if ($request->file('qrcode')) {
            $fileQrcode = $request->file('qrcode');
            $nameQrcode = "qrCodeDoacao." . $fileQrcode->extension();
            $qrcode = Storage::putFileAs('dizimo', $request->file('qrcode'), $nameQrcode);
            if ($qrcode) {
                $doacao->update(['qrcode' => $nameQrcode,]);
                $QrCodeText = "\n QrCode Gravado com sucesso!";
            } else {
                $QrCodeText = "\n QrCode não foi Gravado!";
            }
        } else {
            $nameQrcode = "";
            $QrCodeText = "";
        }

        $action = $doacao->update([
            'banco' => $request->banco,
            'agencia' => $request->agencia,
            'conta' => $request->conta,
            'cnpj' => $request->cnpj,
        ]);
        if ($action) {
            return redirect()->route('doacao.index')->with('success', 'Doação Alterado com sucesso!' . $imagemTopoText . $QrCodeText);
        } else {
            return redirect()->route('doacao.index')->with('error', 'Doação não pode ser Alteradoo!' . $imagemTopoText . $QrCodeText);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doacao $doacao)
    {
        Storage::delete('dizimo/' . $doacao->imgtopo);
        $imgtopodeletado = Storage::get('dizimo/' . $doacao->imgtopo);

        Storage::delete('dizimo/' . $doacao->qrcode);
        $qrcodedeletado = Storage::get('dizimo/' . $doacao->qrcode);

        if (!$imgtopodeletado && !$qrcodedeletado) {
            $action = $doacao->delete();
            if ($action) {
                return redirect()->route('doacao.index')->with('success', 'Doacao deletado com sucesso!');
            } else {
                return redirect()->route('doacao.index')->with('error', 'Doacao não pode ser deletado!');
            }
        }
    }
}
