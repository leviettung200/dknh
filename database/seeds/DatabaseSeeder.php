<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $data = [
//            [
//                'name' => 'Nam',
//                'email' => 'lxc150896@gmail.com',
//                'password' => bcrypt('12345'),
//            ],
//            [
//                'name' => 'Mim',
//                'email' => 'lxc@gmail.com',
//                'password' => bcrypt('12345'),
//            ],
//            [
//                'name' => 'Vân',
//                'email' => 'admin@gmail.com',
//                'password' => bcrypt('12345'),
//            ],
//        ];
//        DB::table('students')->insert($data);
        $data = [
          [
              'code' =>'HVN01',
              'name' =>'Chương trình quốc tế',
              'parent_code' => null,
          ],
            [
                'code' =>'HVN01_1',
                'name' =>'Quản trị kinh doanh nông nghiệp',
                'parent_code' => 'HVN01'
            ],
            [
                'code' =>'HVN01_2',
                'name' =>'Kinh tế nông nghiệp',
                'parent_code' => 'HVN01'
            ],
            [
                'code' =>'HVN01_3',
                'name' =>'Công nghệ sinh học',
                'parent_code' => 'HVN01'
            ],
            [
                'code' =>'HVN01_4',
                'name' =>'Khoa học cây trồng',
                'parent_code' => 'HVN01'
            ],
            [
                'code' =>'HVN01_5',
                'name' =>'Kinh tế tài chính',
                'parent_code' => 'HVN01'
            ],
            [
                'code' =>'HVN02',
                'name' =>'Trồng trọt và Bảo vệ thực vật',
                'parent_code' => null,
            ],
            [
                'code' =>'HVN02_1',
                'name' =>'Bảo vệ thực vật',
                'parent_code' => 'HVN02',
            ],
            [
                'code' =>'HVN02_2',
                'name' =>'Khoa học cây trồng',
                'parent_code' => 'HVN02'
            ],
            [
                'code' =>'HVN02_3',
                'name' =>'Nông nghiệp',
                'parent_code' => 'HVN02'
            ],
            [
                'code' =>'HVN03',
                'name' =>'Chăn nuôi thú y',
                'parent_code' => null,
            ],
            [
                'code' =>'HVN03_1',
                'name' =>'Chăn nuôi',
                'parent_code' => 'HVN03'
            ],
            [
                'code' =>'HVN03_2',
                'name' =>'Chăn nuôi thú y',
                'parent_code' => 'HVN03'
            ],
            [
                'code' =>'HVN04',
                'name' =>'Công nghệ kỹ thuật cơ điện tử',
                'parent_code' => null,
            ],[
                'code' =>'HVN04_1',
                'name' =>'Công nghệ kỹ thuật cơ điện tử',
                'parent_code' => 'HVN04'
            ],[
                'code' =>'HVN04_2',
                'name' =>'Kỹ thuật điện',
                'parent_code' => 'HVN04'
            ],[
                'code' =>'HVN04_3',
                'name' =>'Kỹ thuật điều khiển và tự động hóa',
                'parent_code' => 'HVN04'
            ],[
                'code' =>'HVN05',
                'name' =>'Công nghệ kỹ thuật ô tô',
                'parent_code' => null,
            ],[
                'code' =>'HVN05_1',
                'name' =>'Công nghệ kỹ thuật ô tô',
                'parent_code' => 'HVN05'
            ],[
                'code' =>'HVN05_2',
                'name' =>'Kỹ thuật cơ khí',
                'parent_code' => 'HVN05'
            ],[
                'code' =>'HVN06',
                'name' =>'Công nghệ rau hoa quả và cảnh quan',
                'parent_code' => null,
            ],[
                'code' =>'HVN06_1',
                'name' =>'Công nghệ rau hoa quả và cảnh quan',
                'parent_code' => 'HVN06'
            ],[
                'code' =>'HVN07',
                'name' =>'Công nghệ sinh học',
                'parent_code' => null
            ],[
                'code' =>'HVN07_1',
                'name' =>'Công nghệ sinh học',
                'parent_code' => 'HVN07'
            ],[
                'code' =>'HVN07_2',
                'name' =>'Công nghệ sinh dược',
                'parent_code' => 'HVN07'
            ],[
                'code' =>'HVN08',
                'name' =>'Công nghệ thông tin và truyền thông số',
                'parent_code' => null,
            ],[
                'code' =>'HVN08_1',
                'name' =>'Công nghệ thông tin',
                'parent_code' => 'HVN08'
            ],[
                'code' =>'HVN08_2',
                'name' =>'Mạng máy tính và truyền thông dữ liệu',
                'parent_code' => 'HVN08'
            ],[
                'code' =>'HVN08_3',
                'name' =>'Khoa học dữ liệu và trí tuệ nhân tạo',
                'parent_code' => 'HVN08'
            ],[
                'code' =>'HVN09',
                'name' =>'Công nghệ bảo quản, chế biến và quản lý chất lượng an toàn thực phẩm',
                'parent_code' => null,
            ],[
                'code' =>'HVN09_1',
                'name' =>'Công nghệ sau thu hoạch',
                'parent_code' => 'HVN09'
            ],[
                'code' =>'HVN09_2',
                'name' =>'Công nghệ thực phẩm',
                'parent_code' => 'HVN09'
            ],[
                'code' =>'HVN09_3',
                'name' =>'Công nghệ và kinh doanh thực phẩm',
                'parent_code' => 'HVN09'
            ],[
                'code' =>'HVN10',
                'name' =>'Kế toán – Tài chính',
                'parent_code' => null,
            ],[
                'code' =>'HVN10_1',
                'name' =>'Kế toán',
                'parent_code' => 'HVN10'
            ],[
                'code' =>'HVN10_2',
                'name' =>'Tài chính - Ngân hàng',
                'parent_code' => 'HVN10'
            ],[
                'code' =>'HVN11',
                'name' =>'Khoa học đất - dinh dưỡng cây trồng',
                'parent_code' => null,
            ],[
                'code' =>'HVN11_1',
                'name' =>'Khoa học đất',
                'parent_code' => 'HVN11'
            ],[
                'code' =>'HVN11_2',
                'name' =>'Phân bón và dinh dưỡng cây trồng',
                'parent_code' => 'HVN11'
            ],[
                'code' =>'HVN12',
                'name' =>'Kinh tế và quản lý',
                'parent_code' => null,
            ],[
                'code' =>'HVN12_1',
                'name' =>'Kinh tế',
                'parent_code' => 'HVN12'
            ],[
                'code' =>'HVN12_2',
                'name' =>'Kinh tế đầu tư',
                'parent_code' => 'HVN12'
            ],[
                'code' =>'HVN12_3',
                'name' =>'Kinh tế tài chính',
                'parent_code' => 'HVN12'
            ],[
                'code' =>'HVN12_4',
                'name' =>'Quản lý và phát triển nguồn nhân lực',
                'parent_code' => 'HVN12'
            ],[
                'code' =>'HVN12_5',
                'name' =>'Quản lý kinh tế',
                'parent_code' => 'HVN12'
            ],[
                'code' =>'HVN12_6',
                'name' =>'Kinh tế số',
                'parent_code' => 'HVN12'
            ],[
                'code' =>'HVN13',
                'name' =>'Kinh tế nông nghiệp và Phát triển nông thôn',
                'parent_code' => null,
            ],[
                'code' =>'HVN13_1',
                'name' =>'Kinh tế nông nghiệp',
                'parent_code' => 'HVN13'
            ],[
                'code' =>'HVN13_2',
                'name' =>'Phát triển nông thôn',
                'parent_code' => 'HVN13'
            ],[
                'code' =>'HVN14',
                'name' =>'Luật',
                'parent_code' => null,
            ],[
                'code' =>'HVN14_1',
                'name' =>'Luật',
                'parent_code' => 'HVN14'
            ],[
                'code' =>'HVN15',
                'name' =>'Khoa học môi trường',
                'parent_code' => null,
            ],[
                'code' =>'HVN15_1',
                'name' =>'Khoa học môi trường',
                'parent_code' => 'HVN15'
            ],[
                'code' =>'HVN16',
                'name' =>'Công nghệ hóa học và môi trường',
                'parent_code' => null,
            ],[
                'code' =>'HVN16_1',
                'name' =>'Công nghệ kỹ thuật hóa học',
                'parent_code' => 'HVN16'
            ],[
                'code' =>'HVN16_2',
                'name' =>'Công nghệ kỹ thuật môi trường',
                'parent_code' => 'HVN16'
            ],[
                'code' =>'HVN17',
                'name' =>'Ngôn ngữ Anh',
                'parent_code' => null,
            ],[
                'code' =>'HVN17_1',
                'name' =>'Ngôn ngữ Anh',
                'parent_code' => 'HVN17'
            ],[
                'code' =>'HVN18',
                'name' =>'Nông nghiệp công nghệ cao',
                'parent_code' => null,
            ],[
                'code' =>'HVN18_1',
                'name' =>'Nông nghiệp công nghệ cao',
                'parent_code' => 'HVN18'
            ],[
                'code' =>'HVN19',
                'name' =>'Quản lý đất đai và bất động sản',
                'parent_code' => null,
            ],[
                'code' =>'HVN19_1',
                'name' =>'Quản lý đất đai',
                'parent_code' => 'HVN19'
            ],[
                'code' =>'HVN19_2',
                'name' =>'Quản lý tài nguyên và môi trường',
                'parent_code' => 'HVN19'
            ],[
                'code' =>'HVN19_3',
                'name' =>'Quản lý bất động sản',
                'parent_code' => 'HVN19'
            ],[
                'code' =>'HVN20',
                'name' =>'Quản trị kinh doanh và du lịch',
                'parent_code' => null,
            ],[
                'code' =>'HVN20_1',
                'name' =>'Quản trị kinh doanh',
                'parent_code' => 'HVN20'
            ],[
                'code' =>'HVN20_2',
                'name' =>'Thương mại điện tử',
                'parent_code' => 'HVN20'
            ],[
                'code' =>'HVN20_3',
                'name' =>'Quản lý và phát triển du lịch',
                'parent_code' => 'HVN20'
            ],[
                'code' =>'HVN21',
                'name' =>'Logistics & quản lý chuỗi cung ứng',
                'parent_code' => null,
            ],[
                'code' =>'HVN21_1',
                'name' =>'Logistics & quản lý chuỗi cung ứng',
                'parent_code' => 'HVN21'
            ],[
                'code' =>'HVN22',
                'name' =>'Sư phạm Công nghệ',
                'parent_code' => null,
            ],[
                'code' =>'HVN22_1',
                'name' =>'Sư phạm Kỹ thuật nông nghiệp',
                'parent_code' => 'HVN22'
            ],[
                'code' =>'HVN22_2',
                'name' =>'Sư phạm Công nghệ',
                'parent_code' => 'HVN22'
            ],[
                'code' =>'HVN23',
                'name' =>'Thú y',
                'parent_code' => null
            ],[
                'code' =>'HVN23_1',
                'name' =>'Thú y',
                'parent_code' => 'HVN23'
            ],[
                'code' =>'HVN24',
                'name' =>'Thủy sản',
                'parent_code' => null,
            ],[
                'code' =>'HVN24_1',
                'name' =>'Bệnh học thủy sản',
                'parent_code' => 'HVN24'
            ],[
                'code' =>'HVN24_2',
                'name' =>'Nuôi trồng thủy sản',
                'parent_code' => 'HVN24'
            ],[
                'code' =>'HVN25',
                'name' =>'Xã hội học',
                'parent_code' => null,
            ],[
                'code' =>'HVN25_1',
                'name' =>'Xã hội học',
                'parent_code' => 'HVN25'
            ],




        ];
        DB::table('majors')->insert($data);

    }
}
