@extends('frontend.layouts.app')

@section('title', __('Kebijakan Privasi'))

@section('content')
    <div class="container-fluid pt-5 pb-4">
        <div class="row">
            <div class="col-md-10 ml-5">
                <x-frontend.card>
                    <x-slot name="body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="page_title">
                                    <img src="{{ asset('img/decorations/privacy_titletext.png') }}" alt="">
                                </div>
                                <h4 class="card-title">Pendahuluan</h4>
                                <p>PT Greenfields Dairy Indonesia yang selanjutnya disebut “Greenfields” menghormati dan mendukung hak anda untuk perlindungan privasi dalam pengumpulan, penggunaan, penyingkapan dan penangananan data pribadi Anda. Kebijakan Privasi ini menerangkan pelaksanaan untuk melindungi privasi, agar anda merasa yakin tentang cara kami menangani data pribadi anda yang telah dipertanggungjawabkan kepada kami. Dengan menggunakan situs Greenfields atau memberikan Greenfields dengan data pribadi, anda telah mengizinkan kepada Greenfields untuk mengumpulkan, menggunakan, menyingkap dan/atau memindahkan data pribadi anda (termasuk memindahkan ke luar negeri) berdasarkan Kebijakan Privasi ini.</p>

                                <h4 class="card-title">Cookies</h4>

                                <p>
                                    Seperti kebanyakan perusahaan, kami menggunakan teknologi "cookies" untuk halaman situs kami. Cookies adalah informasi yang disimpan dalam komputer oleh browser anda untuk menyimpan preferensi ketika mengunjungi halaman situs. Saat anda login, cookies akan menginformasikan kepada kami, apakah anda sudah pernah mengunjungi halaman situs kami atau baru pertama kalinya, dan memperbolehkan kami untuk mengetahui iklan manakah yang mengubah halaman anda ke halaman situs kami. Kami menggunakan cookies untuk mengenal pasti ciri-ciri halaman yang menarik minat anda supaya kami bisa lebih memenuhi keperluan anda. Sebagai pilihan, anda boleh mengatur browser anda untuk tidak menyertakan cookies atau anda boleh membuang cookies sebagian atau semuanya dengan mengikuti panduan browser anda. Tetapi, jika pilihan cookies tidak diaktifkan oleh browser anda, anda mungkin mengalami kesulitan saat mengakses situs dan beberapa fitur yang ditawarkan mungkin tidak dapat diakses dengan baik.
                                </p>

                                <h4 class="card-title">Situs Beacons</h4>

                                <p>
                                    Ini merupakan file elektronik di halaman situs yang memperbolehkan kami untuk mengira dan mengenali pasti pengguna yang mengunjungi halaman situs. Selain itu, situs beacon juga bisa digunakan dalam e-mail yang mendukung HTML untuk mengetahui respons dan mengukur efektivitas kepada komunikasi kami. Sebagai contoh, jika anda mendapat e-mail dari kami dan mengklik tautan e-mail yang mengarahkan anda ke halaman situs kami. anda bisa mengindari situs beacon di e-mail dengan mematikan pilihan tampilan HTML dan hanya menampilkan teks saja dalam e-mail anda.
                                </p>

                                <h4 class="card-title">Bagaimana kami menggunakan data pribadi anda</h4>

                                <p>
                                    Tujuan utama Greenfields mengumpulkan data pribadi anda ialah untuk memastikan pelanggan-pelanggan kami puas dengan produk kami dan memberikan mereka kepuasan pelanggan yang terbaik. Informasi anda tidak akan dibagikan, dijual, disewakan atau disingkap kepada pihak luar (kecuali diwajibkan oleh peraturan perundang-undangan yang berlaku) selain seperti yang dinyatakan dalam Kebijakan Privasi. Kami akan mengambil langkah yang wajar untuk memastikan keamanan dan integritas data pribadi anda, termasuk menggunakan komputer dengan kata sandi, kabinet berkunci, kebijakan provasi dan firewall. Greenfields mungkin menggunakan data pribadi yang anda berikan untuk:

                                    <ul>
                                        <li>untuk berkomunikasi dengan anda mengenai produk dan jasa;</li>
                                        <li>untuk memberikan anda sampel produk dan penawaran pribadi;</li>
                                        <li>untuk memberikan anda kesempatan mengikuti kontes, promosi dan survei;</li>
                                        <li>untuk mengarahkan, menyelidiki dan memantau aduan atau pertanyaan mengenai produk dan jasa kami;</li>
                                        <li>untuk tujuan pengembangan produk dan kontrol kualitas;</li>
                                        <li>untuk mengukur kegiatan pemasaran, iklan, dan halaman situs; dan/atau</li>
                                        <li>untuk mempersonalisasi, menilai dan memperbaiki halaman situs kami.</li>
                                    </ul>
                                </p>

                                <h4 class="card-title">Cookies</h4>
                                <p>
                                    Seperti kebanyakan perusahaan, kami menggunakan teknologi "cookies" untuk halaman situs kami. Cookies adalah informasi yang disimpan dalam komputer oleh browser anda untuk menyimpan preferensi ketika mengunjungi halaman situs. Saat anda login, cookies akan menginformasikan kepada kami, apakah anda sudah pernah mengunjungi halaman situs kami atau baru pertama kalinya, dan memperbolehkan kami untuk mengetahui iklan manakah yang mengubah halaman anda ke halaman situs kami. Kami menggunakan cookies untuk mengenal pasti ciri-ciri halaman yang menarik minat anda supaya kami bisa lebih memenuhi keperluan anda. Sebagai pilihan, anda boleh mengatur browser anda untuk tidak menyertakan cookies atau anda boleh membuang cookies sebagian atau semuanya dengan mengikuti panduan browser anda. Tetapi, jika pilihan cookies tidak diaktifkan oleh browser anda, anda mungkin mengalami kesulitan saat mengakses situs dan beberapa fitur yang ditawarkan mungkin tidak dapat diakses dengan baik.
                                </p>

                                <h4 class="card-title">Situs Beacons</h4>

                                <p>
                                    Ini merupakan file elektronik di halaman situs yang memperbolehkan kami untuk mengira dan mengenali pasti pengguna yang mengunjungi halaman situs. Selain itu, situs beacon juga bisa digunakan dalam e-mail yang mendukung HTML untuk mengetahui respons dan mengukur efektivitas kepada komunikasi kami. Sebagai contoh, jika anda mendapat e-mail dari kami dan mengklik tautan e-mail yang mengarahkan anda ke halaman situs kami. anda bisa mengindari situs beacon di e-mail dengan mematikan pilihan tampilan HTML dan hanya menampilkan teks saja dalam e-mail anda.
                                </p>

                                <h4 class="card-title">Bagaimana kami menggunakan data pribadi anda</h4>
                                <p>
                                    Tujuan utama Greenfields mengumpulkan data pribadi anda ialah untuk memastikan pelanggan-pelanggan kami puas dengan produk kami dan memberikan mereka kepuasan pelanggan yang terbaik. Informasi anda tidak akan dibagikan, dijual, disewakan atau disingkap kepada pihak luar (kecuali diwajibkan oleh peraturan perundang-undangan yang berlaku) selain seperti yang dinyatakan dalam Kebijakan Privasi. Kami akan mengambil langkah yang wajar untuk memastikan keamanan dan integritas data pribadi anda, termasuk menggunakan komputer dengan kata sandi, kabinet berkunci, kebijakan provasi dan firewall. Greenfields mungkin menggunakan data pribadi yang anda berikan untuk:
                                    <ul>
                                        <li>untuk berkomunikasi dengan anda mengenai produk dan jasa;</li>
                                        <li>untuk memberikan anda sampel produk dan penawaran pribadi;</li>
                                        <li>untuk memberikan anda kesempatan mengikuti kontes, promosi dan survei;</li>
                                        <li>untuk mengarahkan, menyelidiki dan memantau aduan atau pertanyaan mengenai produk dan jasa kami;</li>
                                        <li>untuk tujuan pengembangan produk dan kontrol kualitas;</li>
                                        <li>untuk mengukur kegiatan pemasaran, iklan, dan halaman situs; dan/atau</li>
                                        <li>untuk mempersonalisasi, menilai dan memperbaiki halaman situs kami.</li>
                                    </ul>
                                </p>

                                <h4 class="card-title">Bagaimana kami berbagi data pribadi</h4>

                                <p>
                                    Kami mungkin memberikan data peribadi anda kepada pihak ketiga tergantung kepada situasi berikut:
                                    Memberikan data anda dengan grup perusahaan Greenfields. Kami mungkin berbagi data dengan grup perusahaan Greenfields, termasuk induk perusahaan, anak perusahaan dan afiliasi perusahaan.
                                    Berbagi data pribadi anda dengan rekan perusahaan. Dengan hati-hati Kami mungkin berbagi informasi anda dengan rekan perusahaan terpilih, jika kami menilai anda mungkin berminat dengan produk atau jasa mereka. anda bisa memilih untuk tidak menerima penawaran dari rekan kami kapan saja dengan mengupdate profile pengguna (jika tersedia) atau menghubungi kami sesuai kontak yang tercantum. Rekan perusahaan kami dilarang menggunakan informasi pribadi anda selain daripada memberikan penawaran atau program yang relevan, dan mereka perlu menjaga data informasi anda dengan hati-hati.
                                    Berbagi informasi anda dengan penyedia jasa. Kami mungkin memberikan data dengan perusahaan atau individu yang memberikan layanan kepada kami. Layanan ini membantu kami untuk memberikan jasa yang anda inginkan, untuk menciptakan atau menjaga database kami, melakukan riset dan Analisa terhadap orang yang meminta produk, jasa, atau informasi dari kami, untuk menyiapkan dan mendistribusikan komunikasi, atau respon terhadap pertanyaan,
                                    Pengiklanan berdasarkan minta (interest-Based Advertising). Greenfields ikut serta dalam iklan sesuai dengan ketertarikan (perilaku online). Ini artinya pihak ketiga mungkin menggunakan cookie di browser anda atau situs beacon, untuk mengidentifikasi di situs kami sehingga dapat menyediakan iklan mengenai produk dan jasa sesuai ketertarikan anda. Anda mungkin dapat melihat iklan di situs kami sesuai dengan bagaimana cara anda browsing atau berbelanja, atau mungkin anda melihat iklan mengenai produk Greenfields di situs lain berdasarkan perilaku browsing anda di situs.
                                    Blog, Posting Online and Testimoni. Kami dapat memperbolehkan pengguna untuk membagikan komentar, posting, testimoni (termasuk rating atau ulasan), atau informasi lainnya. Jika anda memilih untuk mendaftarakan informasi tersebut kepada kami, informasi yang anda berikan bisa tersedia secara umum kepada publik. Informasi yang anda berikan akan bisa dibaca, dikumpulkan, dan digunakan oleh mereka yang mengaksesnya.
                                    Pihak ketiga lainnya. Kami mungkin memberikan informasi non - personal dengan pihak ketiga lainnya yang tidak dijelaskan di atas. Jika kami melakukan hal tersebut, kami mungkin mengagregasikan atau tidak mengidentifikasi informasi sehingga pihak ketiga tidak terhubung dengan data anda, komputer anda, atau perangkat anda. Agregasi data tidak terhubung ke salah satu orang. Tidak mengidentifikasi artinya kami akan menghapus atau megubah Sebagian informasi yang mungkin akan digunakan untuk mengaitkan informasi terhadap seseorang.
                                    Penegakan Hukum dan Proses Hukum. Kami mungkin melaporkan kepada penegak hukum aktivitas apa saja yang kami percaya melanggar hukum, atau yang mungkin merusak investigasi penegakan hukum dan aktivitas yang melanggar hukum. Sebagai tambahan, kami memiliki hak untuk memberikan informasi anda kepada penegak hukum jika kami menentukan, melalui penilaian kami, apakah anda melakukan pelanggaran terhadap kebijakan kami, atau memberikan informasi anda yang dapat melindungi hak, milik, atau keamanan Greenfields atau orang lain.
                                    Memberikan Informasi yang Diijinkan Oleh Hukum. Kami mungkin memberikan informasi anda kepada pihak lain jika diminta, atau diijinkan oleh hukum, Ini termasuk memberikan informasi anda kepada pemerintah, atau pihak ketiga untuk merespon panggilan, perintah pengadilan, proses hukum lainnya, atau jika kami merasa hal tersebut diperlukan sebagai bagian dari hak berdasarkan hukum, untuk menghadapi klaim hukum yang mungkin melawan kami, atau berdasarkan penilaian kami sendiri, untuk melindungi kami dari kemungkinan gugatan hukum.
                                    Transaksi Bisnis. Keadaan dimana Greenfields memutuskan untuk menjual, membeli, menggabungkan atau mengatur ulang bisnis. Seperti transaksi yang melibatkan penyingkapan informasi pribadi untuk calon atau pembeli atau penjual actual. Ini merupakan cara kami untuk mencari perlindungan menyingkap informasi dalam transaksi ini.
                                    Transfer lintas perbatasan. Data pribadi mungkin disimpan di fasilitas penyimpanan atau server yang berada di luar Indonesia atau afiliasi atau pihak ketiga yang terpercaya, yang berada di luar Indonesia, sehingga mereka bisa memproses data mewakili kami dan kami dapat memenuhi permintaan dan menggunakan data pribadi anda.
                                </p>

                                <h4 class="card-title">Konten yang anda bagikan di halaman situs kami</h4>

                                <p>
                                    Dengan membagikan konten ke dan melalui situs yang dikontrol oleh Greenfields dan / atau afiliasi atau penyedia jasa ("Situs Greenfields"), anda bertanggung jawab terhadap hal berikut: (1) Anda adalah pemilik konten; (2) konten jujur dan akurat; (3) konten tidak menyebabkan resiko terhadap orang lain atau perusahaan; (4) konten tidak menggunakan hak cipta, merek dagang, hak milik, atau hak untuk memplubikasikan dan privasi; (5) konten tidak mengandung kekerasan yang melanggar hukum, undang - undang, peraturan, atau regulasi; (6) konten tidak mengandung pencemaran nama baik, tidak memfitnah, tidak menyebarkan kebencian, tidak menyinggung SARA dan kekerasan apapun terhadap pihak lain; (7) konten tidak mengandung referensi ke situs lain, alamat email, kontak atau nomor telefon; (8) jika konten menggunakan nama seseorang, harus memiliki ijin dari orang tersebut; dan (9) konten tidak mengandung virus, worms, atau hal yang dapat merusak program atau file.
                                    Untuk semua konten yang dibagikan, anda menjamin Greenfields hak seterusnya, tidak dapat dibatalkan, tanpa royalti, sub lisensi, hak dan lisensi yang dapat dipindahtangankan untuk digunakan, disalin, dimodifikasi, dihapus, diadaptasi, diterbitkan, diterjemahkan, menghasilkan penerbitan dari dan/ atau menjual dan/ atau mengedarkan konten dan / atau menyertakan konten dalam segala bentuk, tampilan atau teknologi ke seluruh dunia tanpa ganti rugi kepada anda. Anda juga dengan ini memberikan setiap pengguna Situs Greenfields lisensi non-eksklusif untuk mengakses konten anda melalui situs-situs ini, dan untuk menggunakan, mereproduksi, mendistribusikan, menyiapkan karya turunan dari, menampilkan dan melakukan konten seperti yang diizinkan melalui fungsionalitas situs-situs ini.
                                    Semua konten yang anda bagikan mungkin digunakan sesuai kebutuhan Greenfields. Greenfields atau rekan perusakaan mempunyai hak untuk menukar, meringkas atau menghapus konten di Situs Greenfields jika dirasa perlu, atau berdasarkan kebijakan Greenfields, yang telah melanggar panduan atau ketentuan konten. Greenfields tidak menjamin bahwa anda memiliki akses melalui kami untuk mengedit atau menghapus konten yang telah anda bagikan. Rating produk dan komentar tertulis biasanya dipublikasikan dalam tempo dua sampai empat hari kerja. Namun, Greenfields mempunyai hak untuk membuang atau membatalkan konten tanpa alasan.
                                </p>

                                <h4 class="card-title">Anak - Anak</h4>

                                <p>
                                    Privasi anak-anak merupakan perhatian utama kami. Kami tidak dengan sengaja mengumpukan data pribadi anak - anak berumur di bawah 18 tahun atau menyimpan komunikasi yang kami terima yang teridentifikasi dari anak - anak di bawah umur 18 tahun, kecuali kami mendapatkan persetujuan sebelumnya dari orang tua atau wali yang seharusnya.
                                </p>

                                <h4 class="card-title">Tautan</h4>

                                <p>
                                    Halaman situs yang dikelola oleh Greenfields dapat saja mempunyai tautan ke halaman situs lain yang diurus oleh pihak ketiga. Greenfields tidak mempunyai kaitan atau jaminan terhadap kebijakan privasi dari halaman situs pihak ketiga dan tidak akan bertanggung jawab atas kebijakan privasi halaman situs yang lain.
                                </p>

                                <h4 class="card-title">Akses, Revisi, Pembaharuan Atau Pembatasan Proses Data Pribadi Anda</h4>

                                <p>
                                    Jika terdapat perubahan terhadap data pribadi anda (seperti alamat), atau anda tidak lagi mau kami menyimpan data peribadi anda, kami akan berusaha untuk memperbaiki, memperbarui atau menghapus data pribadi anda. Kami mungkin akan mengenakan biaya administrasi yang mungkin ada dalam memperbarui data pribadi anda.
                                    Jika anda merasa bahwa kami mempunyai perlakuan yang kurang tepat atau tidak lengkap mengenai anda, anda bisa meminta kami memperbaikinya. Anda juga meminta untuk tidak menerima komunikasi pemasaran produk dan jasa dari kami. Namun, dengan demikian, akan mempengaruhi layanan yang diberikan dari Greenfields, dimana dengan anda menerima komunikasi tersebut anda juga dapat menikmati layanan kami.
                                    Jika anda ingin mengakses data pribadi anda atau jika anda mempunyai pertanyaan terhadap Kebijakan Privasi kami, atau ingin membuat pengaduan tentang layanan terhadap data privasi anda, silahkan hubungi highgreenfields@gmail.com
                                </p>

                                <h4 class="card-title">Perubahan Terhadap Kebijakan Privasi</h4>

                                <p>
                                    Kami akan menggunakan data pribadi anda yang telah disediakan berdasarkan Kebijakan Privasi. Jika kami ingin mengganti Kebijakan Privasi ini, kami akan mengumumkannya melalui halaman situs kami supaya anda yakin terhadap data yang dikumpul, cara dan dalam keadaan apa kami menggunakannya. Kebijakan Privasi ini telah diperbaharui pada April 2023.
                                </p>
                            </div>
                        </div>
                    </x-slot>
                </x-frontend.card>
            </div>
        </div>
        <!--row-->
    </div>
    <!--container-->
@endsection
