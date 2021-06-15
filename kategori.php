<head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);



.judul {
    color: black;
    font-size: 34px;
    text-align: center;
    font-weight: 600;
    margin-top: 50px;
} 

#data input,
#data textarea,
#data button[type="submit"] {
    font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#data {
    background: #F9F9F9;
    padding: 25px;
    width:100%;
    margin:100px  ;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
 
#data input,
#data textarea {
    width: 100%;
    border: 1px solid #ccc;
    background: #FFF;
    margin: 0 0 5px;
    padding: 10px; 
}

#data input:hover,
#data textarea:hover {
    -webkit-transition: border-color 0.3s ease-in-out;
    -moz-transition: border-color 0.3s ease-in-out;
    transition: border-color 0.3s ease-in-out;
    border: 1px solid #aaa;
}

#data textarea {
    height: 100px;
    max-width: 100%;
    resize: none;
}

#data button{
    cursor: pointer;
    width: 100%;
    border: none;
    background: blue;
    color: #FFF;
    margin: auto;
    margin-bottom: 20px;    
    padding: 10px;
    font-size: 15px;
}
#data #btn {
    cursor: pointer;
    width: 100%;
    border: none;
    background: #cf31ff ;
    color: #FFF;
    margin-top: 20px;
    padding: 10px;
    font-size: 15px;
    text-decoration: none;
}

#data button[type="submit"]:hover {
    background: #43AAAA  ;
    -webkit-transition: background 0.3s ease-in-out;
    -moz-transition: background 0.3s ease-in-out;
    transition: background-color 0.3s ease-in-out;
}

#data button[type="submit"]:active {
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}




::-webkit-input-placeholder {
    color: #888;
}

:-moz-placeholder {
    color: #888;
}

::-moz-placeholder {
    color: #888;
}

:-ms-input-placeholder {
    color: #888;
}
  </style>
</head>

<div class="judul">Tambah Data </div>
      <div id="data">
        <input type="hidden" id="id_nama">
        
        <input placeholder="Nama Bunga" type="text" name="nama" id="nama">
        <input placeholder="Harga" type="text" name="harga" id="harga">
        <input placeholder="img" type="file" name="img" id="img">       
        <label for="image" id="label_gambar" hidden> Gambar Produk </label>
        <div id="ambil_gambar"></div>
        <button name="submit" id="btn" onclick="insert()">Tambahkan</button>
        <button name="simpan" id="btn_update" onclick="update()" hidden> Simpan </button>
      </div>

<script>
     function insert() {
        let nama = document.getElementById('nama').value;
        let harga = document.getElementById('harga').value;
    
        let files = document.getElementById('img').files;

        if (files.length > 0) {
          let formData = new FormData();
          formData.append("img", files[0]);
          formData.append("nama", nama);
          formData.append("harga", harga);
    
          let xhttp = new XMLHttpRequest();
          xhttp.open("POST", "http://localhost/toko_bunga/admin/pages/ajax/ajaxfile.php?request=2", true);
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              let response = this.responseText;
              if (response == 1) {
                alert("Upload Sukses");
               
                document.getElementById("nama").value = "";
                document.getElementById("harga").value = "";
    
                document.getElementById("img").value = "";
              } else {
                alert("Upload Gagal");
              }
            }
          };
          xhttp.send(formData);
        }
      }

    function load_data() {
        var xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const table = document.getElementById('table_data')
                const res = JSON.parse(this.responseText)

                table.innerHTML = null

                for (let key in res) {
                    var tr = document.createElement('tr')
                    var td_kat = document.createElement('td')
                    var td_aksi = document.createElement('td')
                    var upbtn = document.createElement('button')
                    var delbtn = document.createElement('button')
                    var data = res[key]

                    if (res.hasOwnProperty(key)) {
                        upbtn.textContent = "Update"
                        delbtn.textContent = "Delete"

                        upbtn.setAttribute('onclick', `update(${data['kategori_id']},'${data['kategori']}')`)
                        delbtn.setAttribute('onclick', `del(${data['kategori_id']})`)

                        td_aksi.append(upbtn, delbtn)
                        td_kat.textContent = data['kategori']

                        tr.append(td_kat, td_aksi)

                    }

                    table.append(tr)
                }

            }
        };
        xhttp.open("GET", "http://localhost/toko_bunga/admin/pages/ajax/get-data.php", true);
        xhttp.send();
    }

    function update(id, kat) {
        const id_kat = document.getElementById('kategori_id')
        const kategori = document.getElementById('kategori')

        id_kat.value = id
        kategori.value = kat
    }

    function send_update() {
        var xhttp = new XMLHttpRequest()
        const id_kat = document.getElementById('kategori_id')
        const kategori = document.getElementById('kategori')
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                id_kat.value = null
                kategori.value = null
                alert('Berhasil Diupdate')
                load_data()
            }
        };
        xhttp.open("POST", "http://localhost/tubes_pw_new/admin/pages/ajax/edit-kategori.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`id=${id_kat.value}&kategori=${kategori.value}`);
    }


    load_data()
</script>