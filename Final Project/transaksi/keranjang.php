<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="keranjang.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="bgheader" id="home">
        <header>
            <p>Welcome to Vape. salah satu online vape shop terbaik di Indonesia</p>
        </header>
    </div>
    <div class="bar">
        <div class="gambar">
            <a href="#"><img src="image/logovapehitam.png" alt=""></a>
        </div>
        <div class="tombol">
            <a href="#home">HOME</a>
            <a href="#aboutus">ABOUT US</a>
            <a href="#product">PRODUCT</a>
            <a href="#report">REPORT</a>
            <div class="tombol1">
                <a href="../user/user-profil.php"><i class="fa-solid fa-user"></i></a>
            </div>
            <div class="tombol2">
                <a href=""><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="" method="post">
            <div class="keranjang">
                <h2>Keranjang Belanja</h2>

                <div class="item">
                    <div class="checkItem">
                        <input type="checkbox" name="item[]" id="">
                    </div>

                    <div class="namaItem">
                        <img src="../resource/product/img/647db4ac276d8.png" alt="">
                        <p>Produk A</p>
                    </div>
                    <div class="hargaItem">
                        <p>Rp. <span class="harga">30000</span></p>
                    </div>
                    <div class="jumlahItem">
                        <button type="button" class="buttonMin" disabled><i class="bi bi-dash"></i></button>
                        <span class="quantity">1</span>
                        <button type="button" class="buttonPlus"><i class="bi bi-plus"></i></button>
                    </div>
                    <div class="totalItem">
                        <p>Rp. <span class="hargaTotal">30000</span></p>
                    </div>
                </div>
                <div class="item">
                    <div class="checkItem">
                        <input type="checkbox" name="item[]" id="">
                    </div>
                    <div class="namaItem">
                        <img src="../resource/product/img/647db4ac276d8.png" alt="">
                        <p>Produk A hhytedsfdt kdsfji</p>
                    </div>
                    <div class="hargaItem">
                        <p>Rp. <span class="harga">30000</span></p>
                    </div>
                    <div class="jumlahItem">
                        <button type="button" class="buttonMin" disabled><i class="bi bi-dash"></i></button>
                        <span class="quantity">1</span>
                        <button type="button" class="buttonPlus"><i class="bi bi-plus"></i></button>
                    </div>
                    <div class="totalItem">
                        <p>Rp. <span class="hargaTotal">30000</span></p>
                    </div>
                </div>
            </div>
            <div class="pembayaran">

                <h2>Pembayaran</h2>
                <div class="alamat">
                    <h3>Alamat</h3>
                    <p>Bumi suko indah b123</p>
                </div>
                <div class="totalBayar">
                    <h3>Total</h3>
                    <p>Rp. <span class="totalSemua"></span></p>
                </div>
                <div class="button-choice">
                    <button type="submit">Bayar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/73bcd336f4.js" crossorigin="anonymous"></script>
</body>
<script>
    const buttons = document.querySelectorAll("button");
    const minValue = 1;
    const maxValue = 10;

    buttons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const element = event.currentTarget;
            const parent = element.parentNode;
            const numberContainer = parent.querySelector(".quantity");
            const hargaContainer = parent.parentNode.querySelector(".harga");
            const hargaTotalContainer = parent.parentNode.querySelector(".hargaTotal");
            const harga = parseInt(hargaContainer.textContent);
            const number = parseInt(numberContainer.textContent);
            const increment = parent.querySelector(".buttonPlus");
            const decrement = parent.querySelector(".buttonMin");
            const newNumber = element.classList.contains("buttonPlus") ? number + 1 : number - 1;
            numberContainer.textContent = newNumber;
            console.log(newNumber);
            if (newNumber === minValue) {
                decrement.disabled = true;
                numberContainer.classList.add("dim");
                element.blur();
            } else if (newNumber > minValue && newNumber < maxValue) {
                decrement.disabled = false;
                increment.disabled = false;
                numberContainer.classList.remove("dim");
            } else if (newNumber === maxValue) {
                increment.disabled = true;
                element.blur();
            }
            const newHargaTotal = newNumber * harga;
            hargaTotalContainer.textContent = newHargaTotal;
            const totalSemuaElements = document.querySelectorAll('.item input[type="checkbox"]:checked');
                let totalSemua = 0;

                totalSemuaElements.forEach((checkbox) => {
                    const parentItem = checkbox.closest('.item');
                    const hargaTotal = parentItem.querySelector('.hargaTotal');
                    totalSemua += parseInt(hargaTotal.textContent);
                });

                const totalSemuaContainer = document.querySelector(".totalSemua");
                totalSemuaContainer.textContent = totalSemua;
        })
    })
</script>

</html>