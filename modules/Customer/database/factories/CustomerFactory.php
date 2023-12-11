<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $showroom = array('133', '211', '318', '408', '447');
        $staff = array('F471','F544','F571','F574','F622','F676','F700','F705','F707','F719','F725','F735','F762','F604','F780','F783','F785','F791','F793','F794','F795','F796','F797','F821','F825','F805','F835','F000','F004','F198','F666','F482');
        $address = array('TPHCM', 'Hà Nội', 'Long An', 'Tiền Giang', 'Bình Dương', 'Đồng Nai', 'Kiên Giang', 'Tây Ninh', 'Bạc Liêu', 'Bình Phước', 'Cần Thơ', 'Tỉnh thành khác');
        $source = array('Công ty', 'Cá nhân', 'Cửa hàng trưởng', 'Tự đến');
        $product_type = array('VNSPR125LED05', 'VNSPR125SLED11', 'VNSPR125SLED01', 'VNLIBS125MY2001','VNSPR150SLED39', 'VNGTS150SUPERS01','VNGTS300ST34','VNPRI125SLED09','VNPRI125SELED03','VNSPR125SLED39','VNLIBS125E334');
        $product_color = array('Đỏ bóng', 'Đỏ nhám', 'Xanh cỏ úa', 'Vàng gold', 'Tím hoàng hôn', 'Xanh Coban', 'Xanh lá cây', 'Đen nhám', 'Trắng bóng');
        $so_khung = array('RP8M82514NV060418','RP8M82513NV011883','RP8M82514NV060480','RP8M82221NV082269','RP8M82514NV060563','RP8M82514NV060600');
        $so_may = array('M82EM 5132257','M82EM 5131403','M82EM 5133278','M82EM 5133744','M82EM 5132721','M82EM 5133229');
        return [
            'ma_khach_hang' => Str::random(8),
            'ten_khach_hang' => fake()->name(),
            'dia_chi' => $address[array_rand($address)],
            'nguon' => $source[array_rand($source)],
            'ngay_mua' => date('Y/m/d'),
            'loai_xe' => $product_type[array_rand($product_type)],
            'mau_xe' => $product_color[array_rand($product_color)],
            'so_khung' => $so_khung[array_rand($so_khung)],
            'so_may' => $so_may[array_rand($so_may)],
            'so_dien_thoai' => '0' . rand(100000000, 999999999),
            'nhan_vien' => $staff[array_rand($staff)],
            'cua_hang' => $showroom[array_rand($showroom)],
            'noi_mua' => $showroom[array_rand($showroom)],
        ];
    }

}
