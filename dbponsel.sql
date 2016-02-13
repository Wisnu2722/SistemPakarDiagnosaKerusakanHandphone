-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2016 at 10:10 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbponsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE IF NOT EXISTS `kerusakan` (
  `id` varchar(5) NOT NULL,
  `jenis_kerusakan` text NOT NULL,
  `pertanyaan_awal` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id`, `jenis_kerusakan`, `pertanyaan_awal`) VALUES
('R01', 'Sinyal Hilang (No Signal / No Network)', 'T01'),
('R02', 'Sinyal Berubah', 'T05'),
('R03', 'Sinyal Tidak Stabil', 'T08'),
('R04', 'Sinyal Penuh Tapi Tidak Dapat Melakukan Panggilan', 'T11'),
('R05', 'Ponsel Mati Total Karena Mati Sendiri', 'T14'),
('R06', 'Ponsel Mati Total Karena Jatuh', 'T18'),
('R07', 'Ponsel Mati Total Kena Air', 'T20'),
('R08', 'Ponsel Boros Baterai', 'T23'),
('R09', 'Ponsel Bisu', 'T25'),
('R10', 'Ponsel Tuli', 'T28'),
('R11', 'Ponsel Tidak Bisa Bergetar', 'T31'),
('R12', 'Ringtone Mati', 'T34'),
('R13', 'Lampu Atau Led Mati', 'T38'),
('R14', 'Charging Gagal', 'T42'),
('R15', 'Kegagalan Sirkuit Sim Card', 'T48'),
('R16', 'Tampilan Informasi "Contact Service"', 'T52'),
('R17', 'Masalah Keypad', 'T56');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id` varchar(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `ya` varchar(5) NOT NULL,
  `tidak` varchar(5) NOT NULL,
  `id_kerusakan` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`, `ya`, `tidak`, `id_kerusakan`) VALUES
('T01', 'Apakah komponen konektor dan antenna terhubung dengan baik ?', 'T02', 'S01', 'R01'),
('T02', 'Dapatkah ponsel mencari jaringan secara manual ?', 'T03', 'S02', 'R01'),
('T03', 'Apakah ponsel dapat mencari jaringan secara manual, namun kadang gagal?', 'S03', 'T04', 'R01'),
('T04', 'Apakah ponsel hanya dapat menangkap satu jaringan operator/penyedia jasa layanan selular ?', 'S04', 'S05', 'R01'),
('T05', 'Apakah tampilan pada LCD ponsel level sinyal penuh, tetapi saat melakukan panggilan tiba-tiba semua sinyal hilang ?', 'S06', 'T06', 'R02'),
('T06', 'Apakah ponsel pernah jatuh ke dalam air ?', 'S07', 'T07', 'R02'),
('T07', 'Apakah ponsel tidak pernah jatuh ?', 'S09', 'S08', 'R02'),
('T08', 'Apakah seringkali sinyal ponsel terkadang kuat kemudian melemah ?', 'S10', 'T09', 'R03'),
('T09', 'Apakah ponsel sudah berada dalam jangkauan sinyal, tetapi sinyal tetap tidak stabil ?', 'S11', 'T10', 'R03'),
('T10', 'Apakah ponsel tidak dapat mencari jaringan secara manual ?', 'S12', 'S13', 'R03'),
('T11', 'Apakah indicator sinyal ponsel anda penuh tetapi tidak dapat melakukan panggilan ?', 'S14', 'T12', 'R04'),
('T12', 'Apakah pengaturan sudah benar, tetapi ponsel tetap tidak dapat melakukan panggilan ?', 'S15', 'T13', 'R04'),
('T13', 'Apakah ponsel tidak dapat mencari sinyal secara manual ?', 'S16', 'S17', 'R04'),
('T14', 'Apakah baterai masih dalam keadaan baik ?', 'T15', 'S18', 'R05'),
('T15', 'Apakah pada konektor terlihat baterai berkarat ?', 'S19', 'T16', 'R05'),
('T16', 'Apakah pada saat ponsel di charge, indicator proses isi ulang tampil tetapi ponsel tidak dapat dinyalakan ?', 'S20', 'T17', 'R05'),
('T17', 'Apakah proses charging tidak berjalan ?', 'S21', 'S22', 'R05'),
('T18', 'Apakah ponsel Anda sering jatuh ?', 'S23', 'T19', 'R06'),
('T19', 'Apakah ponsel Anda mati karena sering jatuh ?', 'S24', 'S25', 'R06'),
('T20', 'Apakah ponsel Anda pernah terjatuh ke dalam air ?', 'S26', 'T21', 'R07'),
('T21', 'Apakah setelah dinyalakan kembali ponsel mati total ?', 'S27', 'T22', 'R07'),
('T22', 'Apakah ponsel dapat hidup kembali tetapi layar blank ?', 'S28', 'S29', 'R07'),
('T23', 'Apakah baterai ponsel anda cepat sekali habis ?', 'S30', 'T24', 'R08'),
('T24', 'Apakah power supply menunjukan keadaan baterai normal tetapi baterai tetap boros ?', 'S31', 'S32', 'R08'),
('T25', 'Apakah saat melakukan panggilan lawan bicara kita tidak dapat mendengar suara apapun ?', 'S33', 'T26', 'R09'),
('T26', 'Apakah komponen MIC dalam keadaan baik ?', 'T27', 'S34', 'R09'),
('T27', 'Apakah komponen Audio dalam keadaan baik ?', 'S36', 'S35', 'R09'),
('T28', 'Apakah saat melakukan panggilan kita tidak dapat mendengar lawan bicara ?', 'S37', 'T29', 'R10'),
('T29', 'Apakah speaker berfungsi ?', 'T30', 'S38', 'R10'),
('T30', 'Apakah jalur komponen speaker dalam keadaan rusak ?', 'S39', 'S40', 'R10'),
('T31', 'Apakah dalam pengaturan ponsel, fungsi getar telah di aktifkan ?', 'T32', 'S41', 'R11'),
('T32', 'Apakah saat menerima sms/telepon ponsel tidak bergetar ?', 'S42', 'T33', 'R11'),
('T33', 'Apakah komponen dan jalur VIBRA dalam keadaan baik tetapi ponsel masih tidak bergetar ?', 'S43', 'S44', 'R11'),
('T34', 'Apakah ponsel tidak mengeluarkan bunyi saat ada sms/panggilan masuk ?', 'S45', 'T35', 'R12'),
('T35', 'Apakah komponen BUZZER tidak berfungsi dengan baik ?', 'S46', 'T36', 'R12'),
('T36', 'Apakah jalur komponen BUZZER tidak berfungsi dengan baik ?', 'S47', 'T37', 'R12'),
('T37', 'Apakah IC UI masih dalam keadaan baik ?', 'S49', 'S48', 'R12'),
('T38', 'Apakah lampu LED tidak menyala ?', 'S50', 'T39', 'R13'),
('T39', 'Apakah komponen LED tidak berfungsi dengan baik ?', 'S51', 'T40', 'R13'),
('T40', 'Apakah jalur komponen LED tidak berfungsi dengan baik ?', 'S52', 'T41', 'R13'),
('T41', 'Apakah IC UI masih dalam keadaan baik ?', 'S54', 'S53', 'R13'),
('T42', 'Apakah alat charger anda tidak dapat mengisi baterai pada ponsel anda?', 'S55', 'T43', 'R14'),
('T43', 'Apakah saat anda mencoba melakukan isi ulang baterai pada ponsel lain sejenis, alat charger anda berfungsi dengan baik ?', 'S56', 'T44', 'R14'),
('T44', 'Apakah pada layar ponsel muncul pesan “Not Charging” ?', 'S57', 'T45', 'R14'),
('T45', 'Apakah ponsel telah selesai diisi ulang, tetapi indicator pengisian tetap berjalan ?', 'S58', 'T46', 'R14'),
('T46', 'Apakah saat ponsel tidak dalam keadaan isi ulang (charge), indicator isi ulang jalan terus ?', 'S59', 'T47', 'R14'),
('T47', 'Apakah ponsel selalu mati setiap kali akan diisi ulang (charge) ?', 'S60', 'S61', 'R14'),
('T48', 'Apakah lempengan sim card reader bengkok atau kotor ?', 'S62', 'T49', 'R15'),
('T49', 'Apakah resisten SIM lines ke ground nilainya < 200 ?', 'S63', 'T50', 'R15'),
('T50', 'Apakah tegangan VSIM naik menjadi 3/5 volt setelah ponsel dinyalakan?', 'S64', 'T51', 'R15'),
('T51', 'Apakah ada keterangan “SIM card not accepted” pada LCD ponsel ?', 'S65', 'S66', 'R15'),
('T52', 'Apakah Checksum MCU ROM gagal dijalankan ?', 'S67', 'T53', 'R16'),
('T53', 'Apakah interface CCONT gagal dijalankan ?', 'S68', 'T54', 'R16'),
('T54', 'Apakah parallel/serial COBRA gagal ?', 'S69', 'T55', 'R16'),
('T55', 'Apakah Checksum sec/tune Eeprom gagal ?', 'S70', 'S71', 'R16'),
('T56', 'Apakah salah satu atau seluruh keypad ponsel tidak berfungsi ?', 'S72', 'T57', 'R17'),
('T57', 'Apakah salah satu keypad, jika ditekan output ke LCD tidak sesuai ?', 'S73', 'T58', 'R17'),
('T58', 'Apakah jika salah satu tombol ditekan, menyebabkan ponsel mati ?', 'S74', 'S75', 'R17');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE IF NOT EXISTS `solusi` (
  `id` varchar(5) NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id`, `solusi`) VALUES
('S01', 'Penyebab : saklar antenna rusak / penyolderan pin rusak sehingga tidak adanya jaringan atau transmisi\r\nSaran : ganti antenna'),
('S02', 'Penyebab : Jika tidak bisa mencari jaringan dipastikan ada masalah dalam IC RF\r\nSaran : ganti IC RF (HAGAR)'),
('S03', 'Penyebab : IC RF (HAGAR) dan IC AUDIO (COBRA) terdapat kesalahan atau unit-unit disekitar komponen tersebut buruk/kekurangan arus.\r\nSaran : Periksa penyolderan BGA'),
('S04', 'Penyebab : Ada masalah dengan IC VCO\r\nSaran : gantilah IC VCO'),
('S05', 'Tidak ada kerusakan pada handphone. Kemungkinan kerusakan pada bagian lainnya.'),
('S06', 'Penyebab : Transmisi Jaringan\r\nSaran : Cari tempat berkumpulnya jaringan'),
('S07', 'Saran : Periksa VTX dan power supply dari IC PA'),
('S08', 'Penyebab : IC RF (HAGAR) atau IC PA rusak\r\nSaran : Ganti IC RF / IC PA'),
('S09', 'Saran : Kerusakan bukan pada bagian IC RF / IC PA. Periksa bagian antenna.'),
('S10', 'Penyebab : Transmisi jaringan tidak stabil\r\nSaran : Pergi ketempat lebih tinggi '),
('S11', 'Penyebab : IC RF (HAGAR) rusak\r\nSaran : gantilah IC RF (HAGAR)'),
('S12', 'Penyebab : jalur IC PA terputus\r\nSaran : periksa jalur IC PA'),
('S13', 'Penyebab : Kerusakan bukan pada bagian IC PA\r\nSaran : Periksa bagian antenna'),
('S14', 'Penyebab : Kesalahan pengaturan\r\nSaran : Periksa pengaturan pada menu ponsel "Call Setting" dan "Phone Setting"'),
('S15', 'Penyebab : Jalur IC PA tidak berfungsi dengan baik\r\nSaran : Periksa jalur IC PA'),
('S16', 'Penyebab : IC RF (HAGAR) kemungkinan rusak\r\nSaran : Uji IC RF (HAGAR)'),
('S17', 'Penyebab : Tidak terdapat kerusakan pada ponsel anda.\r\nSaran : Kemungkinan terdapat masalah jaringan pada provider kartu SIM anda.'),
('S18', 'Saran : Lepaskan baterai, uji dengan multitester. Apabila baterai sudah rusak, maka ganti dengan yang baru. Namun, apabila baterai masih dalam kondisi baik pasang kembali baterai kemudian hidupkan ponsel.'),
('S19', 'Penyebab : ponsel sudah tua\r\nSaran : tekan secara lembut konektor, jika tingkat kelenturan tidak normal maka perlu mengganti konektor baterai tersebut. Hal ini menyebabkan arus dari baterai menuju ponsel terputus.'),
('S20', 'Penyebab : gangguan pada IC PA\r\nSaran : periksa arus pada IC PA nya'),
('S21', 'Penyebab : gangguan pada power supply\r\nSaran : cabut IC PA pada PCB kemudian bersihkan timah-timah pada PCB dimana IC PA tersebut menempel dengan cairan pembersih IPA, rapikan kemali timah-timah pada kaki-kaki IC PA, pasang kembali IC PA yang lama, nyalakan ponsel.'),
('S22', 'Tidak terjadi kerusakan pada bagian baterai. Periksa bagian konektor charger.'),
('S23', 'Penyebab : Anda ceroboh\r\nSaran : bongkar ponsel, panasi (di blower) kemudian reposisi kembali letak tiap komponen dan modul ponsel.'),
('S24', 'Penyebab : IC PA atau IC Power rusak\r\nSaran : Uji komponen tersebut menggunakan power supply'),
('S25', 'Penyebab : Ponsel sudah mati total\r\nSaran : Bawa ke service centre ponsel'),
('S26', 'Penyebab : Kecerobohan pengguna\r\nSaran : keringkan ponsel dari air yang masuk dengan cara-cara berikut : ponsel di bongkar lalu dijemur, ponsel di blower dengan terlebih dahulu diberi cairan pembersih IPA, ponsel divakum dengan alat vakum dengan diberi cairan pembersih IPA terlebih dahulu, atau bisa menggunakan butiran silica untuk menyerap air pada ponsel.'),
('S27', 'Penyebab : IC PA atau IC Power rusak\r\nSaran : uji komponen tersebut dengan power supply yang memiliki skala 1 ampere'),
('S28', 'Penyebab : modul pada ponsel terhapus\r\nSaran : Gunakan program Flasher untuk program ulang (flash) kemudian lanjutkan dengan menggunakan tool ponsel tersebut.'),
('S29', 'Penyebab : Ponsel sudah mati total\r\nSaran : Bawa ke service centre ponsel'),
('S30', 'Penyebab : arus listrik pada baterai terganggu\r\nSaran : gunakan power supply dengan skala satu ampere untuk menuji baterai pada ponsel.'),
('S31', 'Penyebab : Kerusakan pada IC PA\r\nSaran : ganti IC PA dengan yang baru'),
('S32', 'Penyebab : Baterai ponsel anda sudah rusak.\r\nSaran : Ganti dengan baterai yang baru. Jika tetap terdapat masalah, bawa ke service centre ponsel'),
('S33', 'Penyebab : Komponen MIC atau Audio rusak\r\nSaran : Lakukan pengecekan terhadap kedua komponen tersebut'),
('S34', 'Saran : Jika komponen MIC dalam keadaan tidak baik, gunakan multitester manual pada skala x1, hubungkan kabel kutub positif dan kabel kutub negatif dari multitester pada kaki-kaki komponen MIC, apabila jarum multitester bergerak maka komponen MIC dalam keadaan baik.'),
('S35', 'Penyebab : Audio tidak berfungsi\r\nSaran : Panaskan IC Audio dengan menggunakan blower. Apabila kedua komponen (MIC, Audio) dalam keadaan baik dan ponsel tetap bisu, lakukan flashing terhadap ponsel.'),
('S36', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel'),
('S37', 'Penyebab : Kemungkinan speaker ponsel rusak\r\nSaran : Lakukan pengecekan terhadap speaker'),
('S38', 'Penyebab : Komponen speaker rusak\r\nSaran : Lakukan  pengecekan menggunakan multitester manual pada skala x1, hubungkan kutub positif dan kutub negative dari kabel multitester pada kaki-kaki komponen speaker, apabila jarum multitester bergerak berarti speaker dalam keadaan baik.'),
('S39', 'Penyebab : Jalur komponen speaker rusak\r\nSaran : Lakukan  pengecekan menggunakan multitester manual pada skala x1, hubungkan kabel multitester dengan interface speaker pada kutub positif dan negative apabila jarum tidak bergerak, dapat dipastikan jalurnya terputus. Lakukan sistem jumper untuk menghubungkan jalur yang terputus.'),
('S40', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel'),
('S41', 'Saran : Cek pengaturan getar pada ponsel anda'),
('S42', 'Penyebab : komponen atau jalur VIBRA mengalami kerusakan.\r\nSaran : lakukan pengecekan menggunakan multitester, atau lakukan jumper langsung dari IC pengontrol (IC UI) menuju komponen VIBRA. Setelah jumper dilakukan maka fasilitas getar dapat berfungsi kembali.'),
('S43', 'Penyebab : Kemungkinan IC UI rusak\r\nSaran : Panasi IC UI dengan blower'),
('S44', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel'),
('S45', 'Penyebab : BUZZER dalam keadaan tidak baik\r\nSaran : lakukan pengetesan pada komponen BUZZER'),
('S46', 'Penyebab : BUZZER rusak\r\nSaran : letakkan kabel-kabel multitester manual dengan skala x1 pada kutub-kutub positif dan negative dari komponen BUZZER, tetapi cukup letakkan kabel multistester pada kaki komponen buzzer satu saja, sedangkan satu lagi diketuk-ketukan pada kaki komponen lainnya. Apabila terdapat suara maka buzzer dalam keadaan baik.'),
('S47', 'Penyebab : Jalur buzzer dengan komponen IC UI terputus\r\nSaran : lakukan jumper langsung dari IC UI menuju komponen buzzer. Segera setelah jumper berhasil ringtone dapat berfungsi kembali'),
('S48', 'Penyebab : kemungkinan IC UI rusak\r\nSaran : panasi IC UI menggunakan blower secara hati-hati,tetapi jika IC UI yang lama sudah rusak, maka ganti IC UI ponsel dengan yang baru.'),
('S49', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel'),
('S50', 'Penyebab : Kemungkinan komponen LED rusak\r\nSaran : lakukan pengetesan pada komponen LED'),
('S51', 'Penyebab : LED rusak\r\nSaran : letakkan kabel-kabel multitester manual dengan skala x1 pada kutub-kutub positif dan negative dari komponen LED, tetapi dengan kutub yang terbalik dari kabel multitester. Artinya, kabel merah multitester dihubungkan dengan kutub positif dari LED, apabila LED menyala maka kondisinya dalam keadaan baik.'),
('S52', 'Penyebab : Kemungkinan jalur terputus\r\nSaran : Lakukan jumper langsung dari IC UI pada jalur LED yang terputus'),
('S53', 'Penyebab : kemungkinan IC UI rusak\r\nSaran : panasi IC UI menggunakan blower secara hati-hati, tetapi jika IC UI yang lama sudah rusak, maka ganti IC UI ponsel dengan yang baru.'),
('S54', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel'),
('S55', 'Penyebab : Charger  rusak atau baterai yang rusak\r\nSaran : Coba lakukan pengisian ulang (recharge) pada ponsel sejenis'),
('S56', 'Penyebab : Kemungkinan baterai pada ponsel sudah rusak sehingga tidak mampu lagi diisi ulang\r\nSaran : Ganti baterai anda dengan yang baru'),
('S57', 'Penyebab : IC Charge rusak\r\nSaran : Ganti IC Charge dengan yang baru'),
('S58', 'Penyebab : IC power rusak\r\nSaran : Ganti IC Power dengan yang baru'),
('S59', 'Penyebab : Software rusak\r\nSaran : Lakukan program ulang (flash) dengan versi yang sama'),
('S60', 'Penyebab : IC Charge atau IC Power yang rusak\r\nSaran : Lakukan pengujian lebih lanjut untuk menentukan komponen mana yang rusak, kemudian gantilah komponen tersebut.'),
('S61', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel'),
('S62', 'Penyebab : Lempengan sim card rusak\r\nSaran : bersihkan atau ganti bila merasa perlu'),
('S63', 'Penyebab : Resisten tidak mampu mentransfer data dikarenakan rusak/tergores\r\nSaran : periksa apakah SIM lines terhubung ke ground atau terputus, kemudian cek tampilan mekanik sim reader.'),
('S64', 'Penyebab : Jika naik artinya tegangan normal\r\nSaran : jika tegangan VSIM cocok tetapi ponsel tidak dapat mengenali SIM card, periksa apakah SIM lines terhubung ke ground atau terputus, kemudian cek tampilan mekanik sim reader. Jika tegangan VSIM tidak meningkat pada nilai yang diharapkan, ganti IC Power (CCONT).'),
('S65', 'Penyebab : Settingan SIM lock tidak benar atau IC Audio rusak\r\nSaran : Periksa settingan sim lock, jika benar maka ganti IC audio. Setelah melakukan penggantian, tulis ulang data SIM lock dan tune nilai Rx/Tx setelah mengganti IC Audio (COBRA).'),
('S66', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel'),
('S67', 'Penyebab : Software mengalami crash\r\nSaran : lakukan program ulang (Flash) ponsel, jika masih tidak benar, solder mesin dan coba untuk update software kembali.'),
('S68', 'Penyebab : CCONT rusak atau penyolderannya rusak atau kurang baik.\r\nSaran : Ganti dengan L BGA, solder mesin, jalankan kalibrasi manajemen energy. Jika masih gagal setelah mengerjakan ulang CCONT, kesalahan hampir pasti disebabkan oleh MAD atau jalur PCB rusak.'),
('S69', 'Penyebab : IC COBRA rusak atau penyolderannya rusak atau kurang baik.\r\nSaran : Gantilah COBRA. Jika masih gagal, kesalahan disebabkan oleh MAD atau jalur PCB rusak.'),
('S70', 'Penyebab : Kode produk atau PSN rusak.\r\nSaran : Cek kode IMEI, produk dan PSN. Jika data ponsel benar, coba untuk mereset ponsel.'),
('S71', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel'),
('S72', 'Penyebab : Koneksitas yang buruk pada jalur tersebut\r\nSaran : Periksa dan uji tegangan (volt) pada tombol yang rusak tersebut. Kemudian bersihkan lempengan kuningan keypad pada PCB dengan menggunakan penghapus pensil, apabila masih belum berhasil maka lakukan proses jumper.'),
('S73', 'Penyebab : Kemungkinan  IC Power rusak/mengalami gangguan.\r\nSaran : lakukan pemanasan terhadap IC Power, kalau perlu ganti dengan yang baru. Setelah itu, flashing ulang ponsel.'),
('S74', 'Penyebab : Koneksitas yang kurang baik.\r\nSaran : lakukan jumper terhadap keypad yang rusak tersebut secara vertical dan horizontal.'),
('S75', 'Penyebab : Kerusakan tidak dapat diketahui lebih lanjut\r\nSaran : Bawa ke service centre ponsel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
