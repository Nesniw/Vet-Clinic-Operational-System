<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePekerjaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home', ['title' => 'Beranda']);
});

Route::get('/layanan', function () {
    return view('pages.layanan', ['title' => 'Layanan']);
})->name('LayananPage');

Route::get('/about', function () {
    return view('pages.about', ['title' => 'Tentang']);
});

Route::get('/contactus', function () {
    return view('pages.contactus', ['title' => 'Hubungi Kami']);
});

Route::get('/dashboard', function () {
    return view('admin.admin-dashboard');
})->middleware(['auth:pekerja', 'verified', 'pekerja.status'])->name('adminDashboard');

Route::get('/customerDashboard', function () {
    return view('pages.customer-dashboard');
})->middleware(['auth', 'verified'])->name('customerDashboard');

Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/layanan/reservasi-clinic/kategori',[ReservasiController::class,'getLayananForm'])->middleware(['auth'])->name('ReservasiClinic');
    Route::post('/layanan/reservasi-clinic/layanan', [ReservasiController::class, 'chooseServiceCategory'])->name('chooseServiceCategory');
    Route::post('/layanan/reservasi-clinic/jadwal', [ReservasiController::class, 'chooseServiceAndPet'])->name('chooseServiceAndPet');
    Route::post('/choose-schedule', [ReservasiController::class, 'chooseSchedule'])->name('chooseSchedule');
    Route::get('/halaman-transaksi/{transaksi_id}',[ReservasiController::class,'showHalamanPembayaran'])->name('ShowHalamanPembayaran');
    Route::patch('/halaman-transaksi/{transaksi_id}/upload-bukti-transfer', [ReservasiController::class, 'kirimBuktiPembayaran'])->name('UploadBuktiTransfer');
});


Route::get('/get-layanan-options/{jenis_layanan}', [ReservasiController::class, 'getLayananOptions'])->name('getLayananOptions');




// Routing untuk CRUD Admin terhadap Data Pekerja
Route::get('/data-user',[AdminController::class,'displayUser'])->middleware(['auth:pekerja'])->name('ShowUserData');
Route::get('/data-user/create-user',[AdminController::class,'CreateUserForm'])->middleware(['auth:pekerja'])->name('CreateUserForm');
Route::post('/data-user/create-user',[AdminController::class,'CreateUser'])->middleware(['auth:pekerja'])->name('CreateUserData');
Route::get('/data-user/{user_id}/update-user',[AdminController::class,'UpdateUserForm'])->middleware(['auth:pekerja'])->name('UpdateUserForm');
// Bisa juga dirouting kayak gini. Gatau best practice nya gimana
// Route::get('/update-user/{user_id}',[AdminController::class,'UpdateUserForm'])->middleware(['auth'])->name('UpdateUserForm');
Route::patch('/data-user/{user_id}/updating-user',[AdminController::class,'updateUser'])->middleware(['auth:pekerja'])->name('UpdateUserData');
Route::delete('/data-user/{user_id}',[AdminController::class,'deleteUser'])->middleware(['auth:pekerja'])->name('DeleteUserData');
// Route::get('/userdatatable',[AdminController::class,'displayUserDatatable'])->middleware(['auth'])->name('ShowUsersData');

// Routing untuk CRUD Admin terhadap Data Pasien / Hewan
Route::get('/data-pasien',[AdminController::class,'displayPasien'])->middleware(['auth:pekerja'])->name('ShowPasienData');

// Routing untuk CRUD Admin terhadap Data Pekerja
Route::get('/data-pekerja',[AdminController::class,'displayPekerja'])->middleware(['auth:pekerja'])->name('ShowPekerjaData');
Route::get('/data-pekerja/create-pekerja',[AdminController::class,'CreatePekerjaForm'])->middleware(['auth:pekerja'])->name('CreatePekerjaForm');
Route::post('/data-pekerja/create-pekerja',[AdminController::class,'CreatePekerja'])->middleware(['auth:pekerja'])->name('CreatePekerjaData');
Route::get('/data-pekerja/{pekerja_id}/update-pekerja',[AdminController::class,'updatePekerjaForm'])->middleware(['auth:pekerja'])->name('UpdatePekerjaForm');
Route::patch('/data-pekerja/{pekerja_id}/updating-pekerja',[AdminController::class,'updatePekerja'])->middleware(['auth:pekerja'])->name('UpdatePekerjaData');
Route::delete('/data-pekerja/{pekerja_id}',[AdminController::class,'deletePekerja'])->middleware(['auth:pekerja'])->name('DeletePekerjaData');
Route::patch('/data-pekerja/{pekerja_id}',[AdminController::class,'nonaktifkanPekerja'])->middleware(['auth:pekerja'])->name('NonaktifPekerja');

// Routing untuk CRUD Admin terhadap Data Kategori Layanan dan Layanan nya
Route::get('/data-kategori-layanan',[AdminController::class,'displayKategori'])->middleware(['auth:pekerja'])->name('ShowKategoriData');
Route::get('/data-kategori-layanan/create-kategori',[AdminController::class,'CreateKategoriForm'])->middleware(['auth:pekerja'])->name('CreateKategoriForm');
Route::post('/data-kategori-layanan/create-kategori',[AdminController::class,'CreateKategori'])->middleware(['auth:pekerja'])->name('CreateKategoriData');
Route::delete('/data-kategori-layanan/{kategori_layanan_id}',[AdminController::class,'deleteKategori'])->middleware(['auth:pekerja'])->name('DeleteKategoriData');
Route::get('/data-kategori-layanan/{kategori_layanan_id}/update-kategori',[AdminController::class,'updateKategoriForm'])->middleware(['auth:pekerja'])->name('UpdateKategoriForm');
Route::patch('/data-kategori-layanan/{kategori_layanan_id}/updating-kategori',[AdminController::class,'updateKategori'])->middleware(['auth:pekerja'])->name('UpdateKategoriData');

Route::get('/data-layanan',[AdminController::class,'displayLayanan'])->middleware(['auth:pekerja'])->name('ShowLayananData');
Route::get('/data-layanan/create-layanan',[AdminController::class,'CreateLayananForm'])->middleware(['auth:pekerja'])->name('CreateLayananForm');
Route::post('/data-layanan/create-layanan',[AdminController::class,'CreateLayanan'])->middleware(['auth:pekerja'])->name('CreateLayananData');
Route::get('/data-layanan/{layanan_id}/update-layanan',[AdminController::class,'updateLayananForm'])->middleware(['auth:pekerja'])->name('UpdateLayananForm');
Route::patch('/data-layanan/{layanan_id}/updating-layanan',[AdminController::class,'updateLayanan'])->middleware(['auth:pekerja'])->name('UpdateLayananData');
Route::delete('/data-layanan/{layanan_id}',[AdminController::class,'deleteLayanan'])->middleware(['auth:pekerja'])->name('DeleteLayananData');


// Routing untuk CRUD Jadwal Clinic
Route::get('/data-jadwal',[AdminController::class,'displayJadwal'])->middleware(['auth:pekerja'])->name('ShowJadwalKlinik');
Route::get('/data-jadwal/create-jadwal',[AdminController::class,'createJadwalForm'])->middleware(['auth:pekerja'])->name('CreateJadwalForm');
Route::post('/data-jadwal/create-jadwal',[AdminController::class,'createJadwal'])->middleware(['auth:pekerja'])->name('CreateJadwalKlinik');
Route::get('/data-jadwal/{jadwal_klinik_id}/details',[AdminController::class,'detailsJadwal'])->middleware(['auth:pekerja'])->name('DetailsJadwal');
Route::get('/data-jadwal/{jadwal_klinik_id}/update-jadwal',[AdminController::class,'updateJadwalForm'])->middleware(['auth:pekerja'])->name('UpdateJadwalForm');
Route::patch('/data-jadwal/{jadwal_klinik_id}/updating-jadwal',[AdminController::class,'updateJadwal'])->middleware(['auth:pekerja'])->name('UpdateJadwalData');
Route::delete('/data-jadwal/{jadwal_klinik_id}',[AdminController::class,'deleteJadwal'])->middleware(['auth:pekerja'])->name('DeleteJadwalData');

// Routing untuk display dan konfirmasi data transaksi
Route::get('/data-transaksi/konfirmasi-pembayaran', [AdminController::class,'tampilkanBuktiTransfer'])->name('ShowBuktiPembayaran');
Route::get('/data-transaksi/download-bukti/{transaksi_id}', [AdminController::class,'downloadBukti'])->name('DownloadBuktiPembayaran');
Route::get('/data-transaksi', [AdminController::class,'displayTransaksi'])->name('ShowTransaksi');
Route::get('/data-transaksi/{transaksi_id}/details',[AdminController::class,'detailsTransaksi'])->name('DetailsTransaksi');

Route::post('/data-transaksi/konfirmasi-pembayaran/{transaction}', [AdminController::class,'konfirmasiBuktiTransfer'])->name('KonfirmasiPembayaran');

// Routing untuk CRUD Data User (Profile dari User / Customer)
Route::get('/profileSetting', [ProfileController::class, 'edit'])->middleware(['auth'])->name('editProfile');
Route::patch('/profileSetting', [ProfileController::class, 'update'])->middleware(['auth'])->name('updateProfile');

// Routing untuk CRUD Data Pekerja (Profile dari pekerja)
Route::get('/pekerjaProfile', [ProfilePekerjaController::class, 'view'])->middleware(['auth:pekerja'])->name('viewProfilePekerja');
Route::patch('/pekerjaProfile', [ProfilePekerjaController::class, 'update'])->middleware(['auth:pekerja'])->name('updateProfilePekerja');

// Routing untuk proses CRUD dari fitur MyPets di dashboard Customer
Route::get('/myPets', [PetsController::class, 'viewPets'])->middleware(['auth'])->name('viewPets');
Route::get('/myPets/add', [PetsController::class, 'createRandomCode'])->middleware(['auth'])->name('registerPets');
Route::post('/myPets/addPet', [PetsController::class, 'storePet'])->middleware(['auth'])->name('register_pet');
Route::get('/myPets/update/{kode_pasien}', [PetsController::class, 'updatePetForm'])->middleware(['auth'])->name('updatePetForms');
Route::post('/myPets/updatePet/{kode_pasien}', [PetsController::class, 'updatePet'])->middleware(['auth'])->name('update_pet');
Route::delete('/myPets/delete/{kode_pasien}', [PetsController::class, 'deletePet'])->middleware(['auth'])->name('delete_pet');


// Route::get('/pets', function () {
//     return view('pages.pets');
// })->middleware(['auth'])->name('viewPets');


// Route::get('/myPets', [PetsController::class, 'show'])->middleware(['auth'])->name('viewPets');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/pekerjaAuth.php';