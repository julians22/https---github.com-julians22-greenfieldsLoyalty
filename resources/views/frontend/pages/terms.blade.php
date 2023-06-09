
@extends('frontend.layouts.app')

@section('title', __('Syarat & Ketentuan'))

@section('content')
<div class="container-fluid pt-5 pb-4">
    <div class="row">
        <div class="col-md-10 ml-0 ml-md-5">
            <x-frontend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                {{-- <img src="{{ asset('img/decorations/snk_titletext.png') }}" alt=""> --}}
                                <h1 class="title_text" title="Syarat dan Ketentuan Program">Syarat dan Ketentuan Program</h1>
                            </div>
                            <p>
                                Greenfields Klub Ibu Extra adalah <i>loyalty program</i> yang diselenggarakan oleh PT Greenfields Dairy Indonesia (“Penyelenggara”) sebagai bentuk apresiasi bagi konsumen yang sudah setia memilih Greenfields sebagai pilihan nutrisi terbaik bagi keluarga. Greenfields Klub Ibu Extra dilakukan dengan mekanisme pengumpulan poin dan penukaran hadiah. Program efektif berjalan pada tahun 2023.
                            </p>
                            <p>
                                Greenfields Klub Ibu Extra juga 	berdedikasi untuk mengedukasi para ibu Indonesia supaya lebih bijak dalam memilih susu berkualitas terbaik dengan menyediakan berbagai aktivitas menarik, mulai dari artikel yang dapat diakses serta program Webinar/Kulwap. Yuk #StartFresh dengan Greenfields!
                            </p>
                            <p>
                                Seluruh anggota yang terlibat dan berpartisipasi aktif dalam Program ini (“Anggota”), dengan ini dianggap telah membaca dan memahami dengan baik, serta setuju tanpa syarat untuk patuh dan taat pada syarat dan ketentuan Program sebagaimana tercantum di bawah ini termasuk seluruh perubahannya jika ada (“Ketentuan”). Keputusan Penyelenggara mengenai semua hal–hal yang terkait dengan Program ini bersifat final.
                            </p>
                            <p>
                                Hati-hati dengan segala bentuk penipuan yang dikaitkan dengan program ini. PT Greenfields Dairy Indonesia tidak bertanggungjawab atas semua bentuk kerugian yang ditimbulkan sehubungan dengan penipuan atas Program ini. Program ini tidak dipungut biaya apapun.
                            </p>
                            <h2>
                                <strong><u>Syarat Awal Anggota</u></strong>
                            </h2>
                            <p>
                                <ul>
                                    <li>
                                        Warga Negara Indonesia yang berdomisili di wilayah Republik Indonesia.
                                    </li>
                                    <li>
                                        Merupakan konsumen akhir dan/atau bukan merupakan pelaku dagang serta bukan pemburu hadiah.
                                    </li>
                                    <li>
                                        Program ini tidak berlaku untuk karyawan PT Greenfields Dairy Indonesia dan afiliasinya, beserta seluruh pihak yang terkait dengan penyelenggaraan Program ini.
                                    </li>
                                </ul>
                            </p>

                            <h2>
                                <strong><u>Periode Program</u></strong>
                            </h2>
                            <p>
                                1 Juni 2023 – 31 Desember 2023
                            </p>

                            <h2><strong><u>Mekanisme Program</u></strong></h2>

                            <p>
                                <ul>
                                    <li>
                                        Mekanisme di bawah berlaku untuk konsumen baru & konsumen loyal Greenfields. Khusus konsumen baru, program ini baru akan berlaku ketika melakukan pembelian / transaksi.
                                    </li>
                                    <li>
                                        Daftarkan diri dengan mengisi data diri akurat melalui situs di <a href="{{ route('frontend.index') }}">klubibuextra.greenfieldsdairy.com</a> atau via Whatsapp Business Greenfields Dairy Indonesia 0851-7210-0967 (klik Daftar Program & ikuti instruksi selanjutnya).
                                    </li>
                                    <li>
                                        Upload foto struk pembelian produk Greenfields apapun melalui Situs / Whatsapp Business.
                                    </li>
                                    <li>
                                        Anggota akan mendapatkan poin berdasarkan produk Greenfields yang dibeli. Poin akan terupdate paling lambat 1x24 jam.<br>
                                        Pengisian data diri dilakukan dengan persetujuan sepenuhnya dari Anggota. Untuk lebih lengkapnya mengenai perlindungan data diri Konsumen, bisa diakses pada halaman <a target="_blank" title="Kebijakan Privasi" href="{{ route('frontend.pages.privacy') }}">Kebijakan Privasi</a> berikut.
                                    </li>
                                </ul>
                            </p>

                            <h2><strong><u>Cara Mengumpulkan Poin</u></strong></h2>

                            <p>
                                <ul>
                                    <li>
                                        Pengumpulan poin dilakukan efektif pada Juni 2023 hingga Desember 2023 dengan memperlihatkan struk belanja pada periode tersebut. Di luar dari periode tersebut, poin dikategorikan hangus.</li>
                                    <li>
                                        Pengumpulan didapatkan dengan:

                                        <ul>
                                            <li>Pembelanjaan Produk di channel <i>offline</i> maupun <i>online</i> di manapun.</li>
                                            <li>Kirimkan struk pembelanjaan di Situs / Whatsapp Business Greenfields Dairy Indonesia.</li>
                                            <li>Poin tetap berlaku dengan nilai yang sama baik saat promo diskon produk ataupun tidak.</li>
                                        </ul>
                                    </li>

                                    <li>
                                        Struk pembelian produk yang dianggap valid dan bisa diikutsertakan dalam Program untuk ditukarkan menjadi Poin adalah yang memenuhi ketentuan sebagai berikut:

                                        <ul>
                                            <li>Struk pembelian dianggap sah terhitung 1 bulan (H-1) sejak tanggal pembelian.</li>

                                            <li>Struk ASLI berupa struk komputerisasi (bukan struk manual/ bukan struk merah/ bukan fotokopi/ bukan tulisan tangan/ bukan copy/ bukan duplikat/).</li>
                                            <li>Bukan re-print/ bukan faktur.</li>
                                            <li>Struk harus utuh (tidak terpotong-potong/ tidak tergunting/ tidak terlipat).</li>
                                            <li>Struk harus jelas terbaca.</li>
                                            <li>Struk yang diserahkan harus tercantum nama toko, alamat toko, tanggal pembelian, jam pembelian, jumlah produk yang dibeli, harga produk, dan nomor struk atau nomor invoice</li>
                                        </ul>
                                    </li>

                                    <li>Khusus pembelian di e-commerce, Anggota wajib mengirimkan screenshot bukti pembayaran di halaman pesanan telah selesai atau barang telah diterima, dimana harus tertera tanggal dan jam pembelian. Serta sesuai ketentuan seperti yang sudah dijelaskan pada poin sebelumnya.</li>

                                    <li>Poin tidak dapat diuangkan atau dipindahtangankan.</li>

                                    <li>PT Greenfields Dairy Indonesia berhak melakukan pemeriksaan validitas pembelian produk, dengan cara menganalisa bukti pembelian (struk) atau cara lain yang membuktikan kepemilikan produk secara sah melalui pembelian oleh konsumen. Apabila terdapat ketidaksesuaian dengan syarat dan ketentuan yang berlaku, di mana tanggal struk yang dikirimkan tidak sesuai dengan masa periode program, adanya indikasi bahwa struk yang dilampirkan adalah pembelian yang dilakukan oleh trader, atau indikasi lain yang mengarah ke kecurangan, maka PT Greenfields Dairy Indonesia berhak melakukan pembatalan penambahan poin & penukaran hadiah. </li>

                                    <li>PT Greenfields Dairy Indonesia berhak dan memiliki kewenangan mutlak untuk mendiskualifikasi Anggota yang tidak memenuhi dan/atau melanggar dan/atau dicurigai melakukan kecurangan terhadap Ketentuan ini berdasarkan verifikasi yang dilakukan oleh PT Greenfields Dairy Indonesia, termasuk namun tidak terbatas pada pengecekan ke tempat pembelian.</li>

                                    <li>
                                        Program ini berlaku untuk kemasan:
                                        <br>
                                        <img src="{{ asset('img/point-list.jpg') }}" alt="" style="max-width: 100%; height: auto">
                                    </li>
                                </ul>
                            </p>

                            <h2><strong><u>Cara Submit Struk</u></strong></h2>

                            <p>
                                <ul>
                                    <li>Struk difoto atau discan terlihat jelas, tidak buram, dengan format JPG, JPEG, dan PNG.</li>
                                    <li>
                                        Pastikan struk sudah memuat informasi:
                                        <ol style="list-style: lower-latin">
                                            <li>Nama Toko </li>
                                            <li>Nomor Struk </li>
                                            <li>Tanggal Struk </li>
                                            <li>Nama, jumlah, dan harga produk </li>
                                            <li>Total Belanja </li>
                                        </ol>
                                    </li>
                                </ul>
                            </p>

                            <span id="upload-receipt"></span>

                            <h2><strong><u>Contoh Struk Valid</u></strong></h2>

                            <p>Pembelian Greenfields di Toko Offline yang bekerjasama:</p>

                            <p>
                                <img src="{{ asset('img/receipt-valid-1.png') }}" alt="" style="max-width: 100%; height: auto;">
                            </p>

                            <p>Pembelian Greenfields melalui Greenfields Official Store (Blibli & Tokopedia), Alfagift, KlikIndomaret:</p>

                            <p>
                                <img src="{{ asset('img/receipt-valid-2.png') }}" alt="" style="max-width: 100%; height: auto;">
                            </p>


                            <h2><strong><u>Contoh Struk Tidak Valid</u></strong></h2>
                            <p>
                                <img src="{{ asset('img/receipt-invalid-1.png') }}" alt="" style="max-width: 100%; height: auto;">
                            </p>

                            <h2><strong><u>Cara Menukar Poin & Pengiriman Hadiah</u></strong></h2>
                            <ul>
                                <li>Penukaran hadiah dapat dilakukan kapanpun jika poin sudah mencukupi untuk ditukarkan dengan hadiah yang telah disediakan hingga tanggal 31 Januari 2024.</li>
                                <li>Untuk menukarkan poin dapat dilakukan langsung melalui situs  <a href="{{ route('frontend.index') }}">klubibuextra.greenfieldsdairy.com</a> atau Whatsapp Business Greenfields Dairy Indonesia.</li>
                                <li>Jenis hadiah yang bisa ditukarkan dengan poin adalah jenis hadiah yang sudah disediakan oleh PT Greenfields Dairy Indonesia yang dapat dicek di link berikut ini <a href="{{ route('frontend.redeem.index') }}">klubibuextra.greenfieldsdairy.com/redeem</a>. Selama persediaan masih ada.</li>
                                <li>Pengiriman hadiah berupa barang ataupun E-Voucher / E-Wallet akan diproses & dikirimkan dalam waktu maksimal 4x24 jam.</li>
                                <li>Anggota wajib melakukan dokumentasi berupa video pada saat membuka hadiah. Keluhan mengenai hadiah yang sudah diterima, maksimal 3 hari setelah hadiah diterima oleh konsumen, jika sudah melewati jangka waktu tersebut, keluhan tidak dapat kami layani. Kirimkan video sebagai bukti laporan keluhan melalui e-mail ke consumerfeedabck@greenfieldsdairy.com. Apabila keluhan tidak disertai video, maka penggantian hadiah tidak dapat diproses dengan alasan dan keadaan apapun.</li>
                                <li>Hadiah tidak dapat diuangkan.</li>
                                <li>Jika karena alasan apapun pemberian hadiah tidak dapat berjalan sesuai rencana, PT Greenfields Dairy Indonesia berhak untuk memodifikasi ketentuan pemberian hadiah lain yang senilai dengan hadiah yang telah dijanjikan.</li>
                                <li>Komplain terkait dengan peneriman hadiah maksimal di 3x24 Jam setelah pengiriman hadiah dilakukan dan setelah bukti foto tanda terima hadiah diterima oleh PT Greenfields Dairy Indonesia. Komplain yang kami terima lebih dari 3x24 Jam dari pengiriman hadiah tidak akan di proses oleh tim Greenfields Dairy Indonesia.</li>
                            </ul>

                            <h2><strong><u>Pembebasan Tanggung Jawab</u></strong></h2>
                            <ul>
                                <li>PT Greenfields Dairy Indonesia tidak bertanggung jawab atas kerugian atau kerusakan akibat kejadian luar biasa yang tidak terduga dan/atau kejadian di luar kuasa PT Greenfields Dairy Indonesia.</li>
                                <li>Anggota bertanggung jawab penuh dalam kasus cedera apapun, atau klaim kerusakan akibat kesertaan dalam program dan/atau penebusan hadiah.</li>
                                <li>PT Greenfields Dairy Indonesia tidak bertanggung jawab atas setiap kerugian atau kerusakan akibat memperpanjang dan/atau mengakhiri program.</li>
                            </ul>

                            <h2><strong><u>Data Pribadi</u></strong></h2>
                            <ul>
                                <li>Dengan berpartisipasi dalam Program ini, setiap Anggota dianggap sudah membaca Kebijakan Penyelenggara sehubungan dengan data pribadi sebagaimana tersedia dalam laman <a href="{{ route('frontend.index') }}">klubibuextra.greenfieldsdairy.com</a> dan dengan demikian Anggota dianggap memberikan persetujuan dan kewenangan kepada Penyelenggara untuk mengungkapkan data pribadi Anggota kepada Penyelenggara dan/atau pihak ketiga yang bekerjasama dengan Penyelenggara.</li>
                                <li>Anggota dengan ini memberikan izin kepada Penyelenggara atau pihak ketiga yang ditunjuk oleh Penyelenggara untuk mempublikasikan nama, foto atau testimonial yang diberikan oleh Anggota untuk keperluan komunikasi atau iklan berkenaan dengan Program ini dalam bentuk media cetak, elektronik, maupun digital. Lebih lanjut, dengan mengikuti Program ini, maka setiap Anggota dianggap telah bersedia dan memberikan izin untuk dihubungi Penyelenggara melalui WhatsApp, <i>direct message</i>, email, telepon atau SMS.</li>
                                <li>Dengan berpartisipasi dalam Program ini, Anggota dianggap telah memberikan persetujuan kepada Penyelenggara dalam kurun waktu yang diizinkan oleh peraturan perundang-undangan, untuk menyimpan dan menggunakan informasi pribadi konsumen untuk keperluan verifikasi dalam rangka tujuan pengiriman <i>reward</i> serta ketaatan atas kebijakan internal Penyelenggara dan/atau menghubungi mereka.</li>
                            </ul>

                            <h2><strong><u>Lain-Lain</u></strong></h2>
                            <ul>
                                <li>Dengan mengikuti program ini maka mengindikasikan bahwa Anggota sudah membaca, memahami dan menyetujui untuk syarat dan ketentuan dari program ini.</li>
                                <li>Segala informasi terkait yang diikutsertakan dalam program ini sepenuhnya adalah tanggung jawab Anggota.</li>
                                <li>PT Greenfields Dairy Indonesia dengan ini berhak akan memperbaharui dan/atau mengubah Syarat dan Ketentuan kapan pun dari waktu ke waktu, jika pembaharuan dan/atau perubahan tersebut dipandang perlu.</li>
                                <li>Syarat dan Ketentuan sewaktu-waktu bisa berubah. Selanjutnya merupakan tanggung jawab Konsumen untuk terus mengikuti perkembangan guna mengetahui perubahan yang mungkin terjadi. Dengan tetap ikut serta dalam Program ini, Anggota akan dianggap telah menerima perubahan yang terjadi. Jika Anggota tidak setuju terhadap perubahan dan/atau penyesuaian yang terjadi, Anggota harus segera menghentikan keikutsertaan Program ini.</li>
                                <li>Syarat dan Ketentuan Program Poin bersifat mutlak dan tidak dapat diganggu gugat. Jika terdapat perbedaan pada detail syarat dan ketentuan yang tertera pada situs dan media promosi lainnya, maka detail syarat dan ketentuan yang berlaku akan mengacu pada yang tertera di situs.</li>
                                <li>PT Greenfields Dairy Indonesia berhak membatalkan, menunda dan melakukan perubahan apapun atas Program ini jika terdapat hal yang tidak sesuai dengan syarat dan ketentuan ini atau karena keadaan di luar kendali perusahaan (<i>force majeure</i>).</li>
                                <li>PT Greenfields Dairy Indonesia memiliki hak akan memperpanjang atau menghentikan progam setiap saat dalam durasi yang telah direncanakan tanpa pemberitahuan terlebih dahulu.</li>
                                <li>Seluruh perselisihan yang terkait dengan Program dan aktivitas ini akan diselesaikan secara musyawarah dan mufakat.</li>
                                <li>Untuk keterangan lebih lanjut, silahkan hubungi Greenfields Consumer Service melalui nomor telepon <a href="tel:0851-7210-0967">0851-7210-0967</a>  atau e-mail ke <a href="mailto:consumerfeedabck@greenfieldsdairy.com">consumerfeedabck@greenfieldsdairy.com</a>.</li>
                            </ul>
                        </div>

                        {{-- <div class="col-md-12 mb-2">
                            <h2 class="font-weight-bold">
                                Perhitungan Poin
                            </h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{ asset('img/icon_1_snk.png') }}" alt="" style="height: 60px; width: auto;">
                                        </div>
                                        <div class="ml-2" style="flex: 1;">
                                            <p>Mendapatkan 1 poin setiap belanja Rp. 35.000 berlaku kelipatan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{ asset('img/icon_2_snk.png') }}" alt="" style="height: 60px; width: auto;">
                                        </div>
                                        <div class="ml-2" style="flex: 1;">
                                            <p>Potongan harga 15% di hari ulang tahun (min. belanja Rp. 500.000 dan max. Rp. 1.500.000</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{ asset('img/icon_3_snk.png') }}" alt="" style="height: 60px; width: auto;">
                                        </div>
                                        <div class="ml-2" style="flex: 1;">
                                            <p>Tukarkan poin kamu dengan beragam produk pilihan, hadiah menarik dan juga voucher belanja</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead class="bg-dark-green text-white">
                                            <tr>
                                                <th>Fresh Milk</th>
                                                <th>Poin yang didapat</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Fresh Milk </td>
                                                <td>1000pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Jersey</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Low Fat</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Skimmed</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Chocomalt</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Strawberry</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Low Fat Mochacinno</td>
                                                <td>1750pts</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead class="bg-dark-green text-white">
                                            <tr>
                                                <th>UHT Milk</th>
                                                <th>Poin yang didapat</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Strawberry</td>
                                                <td>1000pts</td>
                                            </tr>
                                            <tr>
                                                <td>Chocomalt</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Full Cream</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Low Fat</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Skimmed</td>
                                                <td>1500pts</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <h2 class="font-weight-bold">
                                PERIODE KEGIATAN
                            </h2>
                            <p>
                                Kegiatan “Loyalty Program” akan berlangsung dari 10 Februari 2023 hingga tanggal 31 Desember
                                2023
                            </p>
                        </div>


                        <div class="col-md-12 mb-2">
                            <h2 class="font-weight-bold">
                                PERSYARATAN PESERTA
                            </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>

                        <div class="col-md-12 mb-2">
                            <h2 class="font-weight-bold">
                                MEKANISME KEGIATAN
                            </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum. Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum
                                dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                in culpa qui officia deserunt
                            </p>
                        </div> --}}
                    </div>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
    <!--row-->
</div>
<!--container-->
@endsection
