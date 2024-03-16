<style>
    .blue {
        color: blue;
    }

    .red {
        color: red;
    }
</style>

<div class="container">

    <p class="text-center  pesan"></p>

    <form id="myForm">

        <input type="hidden" name="username" value="<?= $_COOKIE['username'] ?>">
        <div class="input-group mb-3">

            <input type="password" class="form-control password" name="password" placeholder="Masukkan PIN Lama" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control password_baru1" name="password_baru1" placeholder="Masukkan PIN Baru" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control password_baru2" name="password_baru2" placeholder="Konfirmasi PIN Baru" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="social-auth-links text-center mt-2 mb-3">
            <button type="submit" class="btn btn-block btn-primary">Update PIN</button>
        </div>

    </form>

</div>


<script>
    var myForm = $('#myForm');
    var password_lama = $('.password')
    var password_baru1 = $('.password_baru1')
    var password_baru2 = $('.password_baru2')
    var cek_pass = false;
    var cek_pass_baru = false;
    var password_baru = '';
    var pesan = $('.pesan')
    var isi_pesan1 = "";
    var isi_pesan2 = "";
    var isi_pesan3 = "";


    myForm.on('submit', function(e) {

        e.preventDefault()


        $.ajax({
            type: 'post',
            url: '<?= BASEURL . '/login/cek_ubah_pin' ?>',
            data: myForm.serialize(),
            success: function(res) {
                var hasil = res.trim();

                if (hasil == "salah") {
                    cek_pass = false;

                } else {

                    cek_pass = true;
                }



                if (password_baru1.val() == password_baru2.val()) {
                    cek_pass_baru = true;
                    password_baru = password_baru1.val();
                } else {
                    cek_pass_baru = false;
                    password_baru = "Belum sesuai";
                }




                if (cek_pass && cek_pass_baru) {
                    pesan.removeClass("red")
                    pesan.addClass("blue")
                    isi_pesan1 = "Password lama sesuai dan PIN baru match"
                    console.log(password_baru);
                    ubah_password();


                } else {
                    pesan.removeClass("blue")
                    pesan.addClass("red")
                    isi_pesan1 = ""
                }



                if (!cek_pass) {
                    pesan.removeClass("blue")
                    pesan.addClass("red")
                    isi_pesan2 = "PIN lama tidak sesuai"
                } else {
                    isi_pesan2 = ""
                }

                if (!cek_pass_baru) {
                    pesan.removeClass("blue")
                    pesan.addClass("red")
                    isi_pesan3 = "PIN baru tidak match"
                } else {
                    isi_pesan3 = ""
                }


                pesan.html((isi_pesan1 + " " + isi_pesan2 + " " + isi_pesan3).toUpperCase());


            }
        })
    })
</script>


<script>
    function ubah_password() {
        $.ajax({
            type: 'post',
            url: '<?= BASEURL . '/login/set_ubah_pin' ?>',
            data: myForm.serialize(),
            success: function(res) {
                $('.login-box').hide()
                Swal.fire({
                    icon: 'success',
                    title: 'PIN anda berhasil diubah, silahkan lanjutkan proses komite',
                    showConfirmButton: true,
                    confirmButtonText: 'OK',
                }).then((result) => {
                    window.location.reload();
                })

            }
        })
    }
</script>