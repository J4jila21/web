<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */  
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Transformasi Ekonomi Digital di Indonesia: Peluang dan Tantangan',
                'author' => 'Ayu Sari',
                'slug' => 'transformasi-ekonomi-digital-indonesia',
                'body' => 'Ekonomi digital kini menjadi salah satu pilar utama pertumbuhan nasional. Indonesia sebagai negara dengan populasi internet terbesar di Asia Tenggara memiliki potensi besar untuk mempercepat transformasi ini. E-commerce, fintech, hingga layanan berbasis aplikasi terus berkembang pesat. Namun, tantangan juga hadir, mulai dari literasi digital masyarakat, regulasi yang belum seragam, hingga kesenjangan akses teknologi antara kota besar dan daerah terpencil.
                Transformasi ekonomi digital juga menuntut peningkatan kualitas sumber daya manusia. Pelaku UMKM, misalnya, harus mampu memanfaatkan platform online agar bisa bersaing. Pemerintah dan sektor swasta diharapkan berkolaborasi dalam memberikan pelatihan, infrastruktur, serta regulasi yang mendukung pertumbuhan ekosistem digital. Jika dimanfaatkan secara tepat, ekonomi digital bisa menjadi motor penggerak pembangunan inklusif dan berkelanjutan di Indonesia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Artificial Intelligence: Mengubah Cara Kita Bekerja di Era Modern',
                'author' => 'Jonathan Wijaya',
                'slug' => 'artificial-intelligence-era-modern',
                'body' => 'Artificial Intelligence (AI) bukan lagi sekadar konsep futuristik, melainkan realitas yang sudah hadir dalam kehidupan sehari-hari. Mulai dari chatbot layanan pelanggan, sistem rekomendasi belanja online, hingga teknologi pengenalan wajah, semua itu merupakan implementasi nyata AI.
                Di dunia kerja, AI menghadirkan efisiensi baru. Banyak pekerjaan rutin dapat diotomatisasi, memungkinkan manusia untuk fokus pada kreativitas dan inovasi. Namun, ada pula kekhawatiran bahwa AI akan menggantikan tenaga kerja manusia. Tantangan terbesar bukanlah hilangnya pekerjaan, melainkan perubahan kompetensi yang dibutuhkan.
                Masyarakat dituntut untuk menguasai keterampilan baru, khususnya yang berkaitan dengan analisis data, pemrograman, dan pemikiran kritis. Dengan pendekatan yang tepat, AI dapat menjadi mitra, bukan ancaman, dalam meningkatkan produktivitas dan kualitas hidup.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pendidikan Berbasis Teknologi: Masa Depan Sistem Belajar di Indonesia',
                'author' => 'Jonathan Doe',
                'slug' => 'pendidikan-berbasis-teknologi-indonesia',
                'body' => 'Pendidikan berbasis teknologi semakin menjadi kebutuhan utama dalam era digital. Pandemi COVID-19 telah mempercepat adopsi pembelajaran online di sekolah maupun universitas. Aplikasi e-learning, video conference, dan platform digital kini menjadi bagian tak terpisahkan dari kegiatan belajar mengajar.
                Namun, penerapan teknologi dalam pendidikan tidak hanya soal mengganti papan tulis dengan layar digital. Lebih dari itu, teknologi membuka peluang untuk personalisasi pembelajaran. Setiap siswa dapat belajar sesuai kecepatan dan gaya belajar masing-masing. Guru pun bisa memanfaatkan data untuk menganalisis kemajuan siswa secara lebih objektif.
                Meski begitu, tantangan tetap ada. Tidak semua sekolah memiliki fasilitas memadai, dan tidak semua siswa memiliki akses internet stabil. Oleh karena itu, kolaborasi antara pemerintah, sekolah, dan penyedia teknologi sangat penting agar kesenjangan pendidikan dapat diminimalisasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Peran Startup dalam Pertumbuhan Ekonomi Nasional',
                'author' => 'Agung Kurniawan',
                'slug' => 'peran-startup-dalam-pertumbuhan-ekonomi',
                'body' => 'Startup di Indonesia berkembang sangat pesat dalam satu dekade terakhir. Kehadiran mereka tidak hanya membuka lapangan kerja baru, tetapi juga melahirkan inovasi yang mengubah perilaku masyarakat. Dari transportasi online, pembayaran digital, hingga layanan kesehatan berbasis aplikasi, startup menjadi motor penggerak transformasi ekonomi.
                Namun, banyak startup juga menghadapi kendala seperti pendanaan, regulasi, dan persaingan ketat. Untuk bertahan, mereka dituntut untuk terus berinovasi dan memahami kebutuhan pasar. Di sisi lain, pemerintah perlu memberikan dukungan berupa kebijakan yang mendorong perkembangan ekosistem startup.
                Jika didukung dengan baik, startup Indonesia tidak hanya bisa menguasai pasar lokal, tetapi juga mampu bersaing di tingkat global. Dengan demikian, startup berpotensi besar menjadi salah satu tulang punggung ekonomi nasional di era digital.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Masa Depan Tenaga Kerja di Era Otomatisasi dan AI',
                'author' => 'Ratna Sadewi',
                'slug' => 'masa-depan-tenaga-kerja-di-era-ai',
                'body' => 'Revolusi industri 4.0 membawa perubahan besar dalam dunia kerja. Banyak pekerjaan manual kini bisa digantikan oleh mesin atau AI, seperti layanan pelanggan otomatis dan robot industri. Meski demikian, bukan berarti tenaga kerja manusia tidak lagi dibutuhkan.
                Fakta menunjukkan bahwa setiap revolusi industri justru menciptakan lapangan kerja baru. Bedanya, keterampilan yang diperlukan berubah. Di masa depan, pekerja dituntut memiliki kemampuan yang lebih kreatif, analitis, dan adaptif. Bidang seperti analisis data, pengembangan perangkat lunak, desain, dan manajemen strategis akan semakin dibutuhkan.
                Pemerintah dan lembaga pendidikan harus berperan aktif dalam menyiapkan generasi muda menghadapi era ini. Program pelatihan, kurikulum berbasis teknologi, dan kemitraan dengan industri adalah langkah strategis agar tenaga kerja Indonesia tetap relevan di pasar global.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dampak Ekonomi Digital Terhadap UMKM di Indonesia',
                'author' => 'Rudi Setiawan',
                'slug' => 'dampak-ekonomi-digital-umkm',
                'body' => 'Ekonomi digital telah membawa perubahan besar bagi pelaku UMKM di Indonesia. Melalui platform digital, UMKM kini dapat menjangkau pasar yang lebih luas tanpa batas geografis. Selain itu, kemudahan dalam pembayaran digital juga meningkatkan transaksi secara signifikan. Namun, tantangan terbesar adalah literasi digital yang masih rendah di kalangan pelaku UMKM. Oleh karena itu, edukasi dan pendampingan menjadi kunci untuk memastikan UMKM mampu bersaing di era digital yang semakin kompetitif.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Peran Artificial Intelligence dalam Dunia Pendidikan',
                'author' => 'Jablud Nauri',
                'slug' => 'peran-ai-dalam-pendidikan',
                'body' => 'Artificial Intelligence (AI) semakin banyak digunakan dalam dunia pendidikan, mulai dari sistem pembelajaran adaptif, analisis data siswa, hingga asisten belajar berbasis chatbot. AI memungkinkan personalisasi pembelajaran sesuai kebutuhan siswa sehingga proses belajar lebih efektif. Meski begitu, penggunaan AI juga menimbulkan tantangan etika dan privasi yang perlu diperhatikan. Masa depan pendidikan akan semakin bergantung pada kolaborasi antara guru dan teknologi cerdas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ekonomi Hijau dan Masa Depan Berkelanjutan',
                'author' => 'Reddit Edited',
                'slug' => 'ekonomi-hijau-berkelanjutan',
                'body' => 'Konsep ekonomi hijau semakin banyak diperbincangkan di tengah isu perubahan iklim. Ekonomi hijau menekankan pentingnya pertumbuhan ekonomi yang selaras dengan kelestarian lingkungan. Investasi pada energi terbarukan, pengelolaan limbah, dan transportasi ramah lingkungan menjadi fondasi utama dalam mewujudkan masa depan berkelanjutan. Indonesia memiliki peluang besar untuk menjadi pelopor ekonomi hijau di Asia Tenggara dengan memanfaatkan sumber daya alam yang melimpah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'AI dan Masa Depan Dunia Kerja',
                'author' => 'Jablud Edited',
                'slug' => 'ai-dan-masa-depan-kerja',
                'body' => 'Kehadiran AI memunculkan perdebatan tentang masa depan dunia kerja. Beberapa pekerjaan manual dan administratif berpotensi digantikan oleh mesin cerdas. Namun, AI juga membuka peluang lahirnya profesi baru yang sebelumnya tidak pernah ada. Untuk menghadapi hal ini, pekerja perlu meningkatkan keterampilan yang berfokus pada kreativitas, pemecahan masalah, dan keahlian yang tidak mudah digantikan oleh mesin. Adaptasi menjadi kunci agar tenaga kerja tetap relevan di era otomatisasi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pendidikan Karakter di Era Digital',
                'author' => 'Jhon Doe',
                'slug' => 'pendidikan-karakter-era-digital',
                'body' => 'Perkembangan teknologi membawa dampak positif sekaligus tantangan bagi dunia pendidikan. Salah satu tantangan terbesar adalah menjaga karakter dan moral generasi muda. Pendidikan karakter harus tetap menjadi prioritas agar siswa tidak hanya cerdas secara akademik, tetapi juga memiliki integritas, empati, dan rasa tanggung jawab. Integrasi teknologi dengan nilai-nilai moral menjadi strategi penting dalam membangun generasi emas Indonesia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kebijakan Fiskal dan Dampaknya terhadap Pertumbuhan Ekonomi',
                'author' => 'Rizky Putra',
                'slug' => 'kebijakan-fiskal-dan-pertumbuhan-ekonomi',
                'body' => 'Kebijakan fiskal adalah salah satu instrumen penting yang digunakan pemerintah untuk mengatur stabilitas dan pertumbuhan ekonomi. Melalui pengelolaan anggaran negara, baik dari sisi pendapatan maupun belanja, pemerintah dapat memengaruhi aktivitas ekonomi masyarakat. Misalnya, dalam kondisi krisis, peningkatan belanja infrastruktur dapat menciptakan lapangan kerja baru dan mendorong daya beli. Sebaliknya, dalam kondisi inflasi tinggi, pengurangan belanja atau peningkatan pajak dapat membantu menurunkan tekanan harga. Namun, kebijakan fiskal juga memiliki tantangan. Defisit anggaran yang terlalu besar dapat membebani keuangan negara dalam jangka panjang. Oleh karena itu, kebijakan fiskal harus dilaksanakan secara hati-hati, transparan, dan berkelanjutan agar benar-benar mampu mendorong pertumbuhan ekonomi yang inklusif.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'AI dalam Dunia Pendidikan: Solusi atau Tantangan?',
                'author' => 'Alfa Maulana',
                'slug' => 'ai-dalam-dunia-pendidikan',
                'body' => 'Artificial Intelligence (AI) mulai digunakan secara luas dalam dunia pendidikan. Aplikasi AI dapat membantu siswa mendapatkan pengalaman belajar yang lebih personal, misalnya dengan sistem yang menyesuaikan materi sesuai tingkat pemahaman individu. Guru pun terbantu dengan analisis data untuk memantau perkembangan siswa. Namun, kehadiran AI juga menimbulkan pertanyaan. Apakah guru akan tergantikan? Bagaimana dengan interaksi sosial siswa? Faktanya, AI seharusnya menjadi pendukung, bukan pengganti. Teknologi hanya mampu mengelola informasi, sementara pendidikan membutuhkan sentuhan manusia dalam membentuk karakter dan nilai moral. Oleh sebab itu, integrasi AI dalam pendidikan perlu dilakukan secara bijak, dengan tetap menjaga keseimbangan antara teknologi dan peran guru sebagai pendidik utama.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pendidikan Karakter sebagai Fondasi Masa Depan Bangsa',
                'author' => 'David Maulana',
                'slug' => 'pendidikan-karakter-fondasi-bangsa',
                'body' => 'Dalam menghadapi era globalisasi, pendidikan karakter menjadi aspek yang tidak boleh diabaikan. Pengetahuan akademik memang penting, tetapi tanpa karakter yang kuat, generasi muda akan kesulitan menghadapi tantangan kehidupan. Nilai-nilai seperti kejujuran, disiplin, empati, dan kerja sama harus ditanamkan sejak dini melalui pendidikan formal maupun lingkungan keluarga. Sekolah berperan besar dalam membentuk karakter siswa, namun lingkungan masyarakat juga harus mendukung. Sayangnya, sistem pendidikan sering kali terlalu fokus pada pencapaian akademik semata. Padahal, kombinasi antara ilmu pengetahuan dan pembentukan karakter adalah kunci melahirkan generasi yang unggul dan berintegritas untuk masa depan bangsa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inovasi Teknologi sebagai Pendorong Pertumbuhan Ekonomi Kreatif',
                'author' => 'Rona Sari',
                'slug' => 'inovasi-teknologi-pertumbuhan-ekonomi-kreatif',
                'body' => 'Ekonomi kreatif di Indonesia terus berkembang pesat berkat dukungan inovasi teknologi. Sektor ini mencakup industri film, musik, kuliner, hingga aplikasi digital yang semakin digemari masyarakat. Platform digital dan media sosial memungkinkan pelaku ekonomi kreatif menjangkau pasar lebih luas tanpa batas geografis. Namun, tantangan tetap ada, seperti perlindungan hak cipta, akses pembiayaan, dan keterampilan digital pelaku usaha. Untuk mendorong pertumbuhan ekonomi kreatif, perlu adanya dukungan regulasi yang jelas, insentif dari pemerintah, serta kolaborasi dengan sektor swasta. Dengan inovasi teknologi yang berkelanjutan, ekonomi kreatif berpotensi menjadi salah satu sektor unggulan dalam perekonomian Indonesia, bahkan mampu bersaing di pasar global.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pendidikan Tinggi dan Tantangan Kesiapan Kerja di Era Global',
                'author' => 'Fahmi Maulana',
                'slug' => 'pendidikan-tinggi-dan-tantangan-kesiapan-kerja',
                'body' => 'Pendidikan tinggi tidak hanya bertujuan menghasilkan lulusan berpengetahuan, tetapi juga harus menyiapkan mahasiswa agar siap menghadapi dunia kerja yang semakin kompetitif. Sayangnya, masih banyak lulusan perguruan tinggi yang kurang memiliki keterampilan praktis sesuai kebutuhan industri. Kesenjangan ini dapat diatasi melalui kerja sama erat antara perguruan tinggi dan sektor industri. Program magang, proyek kolaboratif, serta kurikulum adaptif menjadi solusi agar mahasiswa mendapatkan pengalaman nyata sebelum lulus. Selain itu, kemampuan soft skills seperti komunikasi, kepemimpinan, dan pemecahan masalah juga harus dikembangkan. Dengan demikian, lulusan pendidikan tinggi Indonesia tidak hanya unggul secara akademik, tetapi juga kompetitif di pasar kerja global.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
