<?php

namespace App\Http\Controllers\Admin;

use App\Models\Province;
use App\Models\City;
use App\Models\Wards;
use Illuminate\Support\Facades\DB;
use App\Models\Feeship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    public function update_delivery(Request $request)
    {
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'], '.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }
    public function select_feeship()
    {
        $feeship = Feeship::orderby('fee_id', 'DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">  
			<table class="table table-bordered">
				<thread> 
					<tr>
						<th>Tên thành phố</th>
						<th>Tên quận huyện</th> 
						<th>Tên xã phường</th>
						<th>Phí ship</th>
					</tr>  
				</thread>
				<tbody>
				';

        foreach ($feeship as $key => $fee) {

            $output .= '
					<tr>
						<td>' . $fee->city->name . '</td>
						<td>' . $fee->province->name . '</td>
						<td>' . $fee->wards->name . '</td>
						<td contenteditable data-feeship_id="' . $fee->fee_id . '" class="fee_feeship_edit">' . number_format($fee->fee_feeship, 0, ',', '.') . '</td>
					</tr>
					';
        }

        $output .= '		
				</tbody>
				</table></div>
				';

        echo $output;
    }
    public function insert_delivery(Request $request)
    {
        $data = $request->all();

        DB::table('tbl_feeship')->insert([
            'fee_matp' => $data['city'],
            'fee_maqh' => $data['province'],
            'fee_xaid' => $data['wards'],
            'fee_feeship' => $data['fee_ship'],
        ]);
    }
    public function delivery(Request $request)
    {

        $city = City::orderby('matp', 'ASC')->get();
        return view('admin.delivery.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn quận huyện---</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name . '</option>';
                }
            } else {
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn xã phường---</option>';
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                }
            }
            echo $output;
        }
    }
}
