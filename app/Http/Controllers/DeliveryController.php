<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Quanhuyen;
use App\Models\Thanhpho;
use App\Models\Xaphuong;
use App\Models\Feeship;

class DeliveryController extends Controller
{
    public function delivery(Request $request)
    {
        $thanhpho = Thanhpho::orderby('matp', 'ASC')->get();
        return view('admin.delivery.add_delivery', compact('thanhpho'));
    }

    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "thanhpho") {
                $select_quanhuyen = Quanhuyen::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output = '<option >Chọn Quận/Huyện</option>';
                foreach ($select_quanhuyen as $key => $qh) {
                    $output .= '<option value="' . $qh->maqh . '">' . $qh->ten_quanhuyen . '</option>';
                }
            } else {
                $select_phuongxa = Xaphuong::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output = '<option value="">Chọn Xã/Phường</option>';
                foreach ($select_phuongxa as $key => $px) {
                    $output .= '<option value="' . $px->xaid . '">' . $px->ten_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }

    public function add_delivery(Request $request)
    {
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['thanhpho'];
        $fee_ship->fee_maqh = $data['quanhuyen'];
        $fee_ship->fee_xaid = $data['phuongxa'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }

    public function show_delivery(Request $request)
    {
        $fee_ship = Feeship::orderby('fee_id', 'DESC')->get();
        return view('admin.delivery.show_delivery', compact('fee_ship'));
    }

    public function update_fee(Request $request)
    {
        $feeId = $request->input('fee_id');
        $newFee = $request->input('new_fee');

        try {
            $fee = Feeship::find($feeId);

            // Lưu giá trị phí mới trực tiếp
            $fee->fee_feeship = $newFee;

            $fee->save();



            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
