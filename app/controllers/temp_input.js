


// onkeypress="return hanyaAngka(event)" 
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
    return true;
}


// tambahkan titik jika yang di input sudah menjadi angka ribuan
function ubah_input(angka, prefix) {
    if (parseFloat(angka) >= 0) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            plafond = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
            separator = sisa ? '.' : '';
            plafond += separator + ribuan.join('.');
        }
        plafond = split[1] != undefined ? plafond + ',' + split[1] : plafond;
        return prefix == undefined ? plafond : (plafond ? plafond : '');
    } else {
        angka = angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        return prefix == undefined ? angka : (angka ? angka : '');
    }




}



// $(document).on('click', '#btn_modal_detail', function (event) {
//     var no_permohonan_kredit = $(this).data('no_permohonan_kredit')

//     $.ajax({
//         type: 'post',
//         url: '<?= BASEURL . ' / cs / modal_detail' ?>',
//         data: {
//             'no_permohonan_kredit': no_permohonan_kredit
//         },
//         success: function (res) {
//             $('.modal_detail').html(res)
//             $("#modal_detail").modal('show')

//         }
//     })
// })


// Swal.fire({
//     title: "Yakin ingin hapus seluruh data SLIK pada pemohon ini?",
//     // icon: 'success',
//     showCancelButton: true,
//     confirmButtonText: "Ya",
//     cancelButtonText: "Batal",
//     confirmButtonColor: "#3EC59D",
//     cancelButtonColor: "#BB2D3B",

//     showLoaderOnConfirm: true,
// }).then((result) => {
//     if (result.isConfirmed) {

//         Swal.fire({

//             icon: 'success',
//             title: 'Data berhasil dihapus',
//             showConfirmButton: false,
//             timer: 1500
//         }).then((result) => {
//             window.location.href = urlToRedirect;
//         })
//     } else {

//     }
// })


// window.location.href = "<?= BASEURL; ?>/cs/daftar_permohonan_kredit";





Swal.fire({

    title: '<strong>Yakin ingin hapus seluruh data SLIK pada permohonan ini?</strong>',
    html: 'No. Permohonan : <b> ' + no_permohonan_kredit + '</b>' +
        '<br>' +
        'Nama Pemohon : <b> ' + nama_pemohon + '</b>' +
        '<br>' +
        'Nama Instansi : <b> ' + nama_instansi + '</b>' +
        '<br>',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Ya",
    cancelButtonText: "Batal",
    showLoaderOnConfirm: true,
})