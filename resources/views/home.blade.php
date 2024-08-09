<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiseaseAPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">DiseaseAPI</a>
            @if(session('user'))
            <a class="navbar-brand" href="#">Halo, {{session('user')->name}}</a>
            <a href="{{ route('logout') }}" class="navbar-brand">Logout</a>
            @else
            <a href="{{ route('loginView') }}" class="navbar-brand">Login</a>
            @endif
        </div>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#introduction">Introduction</a>
                    <a class="nav-link" href="#Apikey">API Token</a>
                    <a class="nav-link" href="#GetDisease">GetDisease</a>
                    <a class="nav-link" href="#GetSymptoms">GetSymptoms</a>
                    <a class="nav-link" href="#Predict">Predict</a>
                </nav>
            </div>
            <div class="col-md-9">
                <section id="introduction">
                    <h2>Introduction</h2>
                    <p>Selamat datang di DiseaseAPI, API revolusioner yang didesain khusus untuk membantu Anda dalam
                        mencari nama penyakit berdasarkan gejala yang Anda sampaikan. Apakah Anda sering kali merasa
                        bingung atau khawatir dengan gejala yang Anda alami, namun tidak tahu penyebabnya? DiseaseAPI
                        hadir untuk memberikan solusi atas masalah tersebut
                    <p>Dengan DiseaseAPI, Anda dapat dengan mudah mengidentifikasi dan mengetahui kemungkinan penyakit
                        yang mungkin Anda alami berdasarkan gejala yang telah Anda tuliskan. API ini didukung oleh data
                        medis terkini dan akurat, serta ditenagai oleh teknologi pemrosesan bahasa alami tercanggih,
                        sehingga memberikan hasil yang tepat dan dapat diandalkan.
                </section>
                <section id="Apikey" class="mb-5">
                    <h3>API Token</h3>
                    <p>Anda dapat lihat API Token anda dibawah sini</p>
                    <div class="container">
                        <div class="input-box">
                            @if(session('userToken'))
                            <input value="{{ session('userToken') }}" type="password" spellcheck="false" disabled>
                            <label for=""></label>
                            @else
                            <input value="" type="password" spellcheck="false" disabled>
                            <label for="">Login untuk dapatkan API Token</label>
                            @endif
                            <i class="uil uil-eye-slash toggle"></i>
                        </div>
                    </div>



                </section>

                <h2>Dokumentasi API</h2>

                <section id="endpoint">
                    <h3>1. GetDisease</h3>
                    <P>Method GetDisease bertujuan untuk mengambil seluruh data nama penyakit</P>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">URL</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Parameter</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Contoh
                                Respon</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Metode</th>
                                        <th>URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GET</td>
                                        <td>.../api/getdisease</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Method</th>
                                        <th>Parameter</th>
                                        <th>Wajib</th>
                                        <th>Tipe</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GET</td>
                                        <td>API Token</td>
                                        <td>Ya</td>
                                        <td>String</td>
                                        <td>Token API</td>
                                    </tr>
                                    <tr>
                                        <td>GET</td>
                                        <td>id</td>
                                        <td>Tidak</td>
                                        <td>Int</td>
                                        <td>ID salah satu penyakit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Contoh</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <pre><code>{
   "status": {
       "code": "200",
       "description": "Request Valid"
   },
   "results": [
       {
           "id": 1,
           "disease_name": "hypertensive disease"
       },
       {
           "id": 2,
           "disease_name": "diabetes"
       },
       {
           "id": 3,
           "disease_name": "depression mental"
       }
   ]

                                    
}</code></pre>
                                        </td>
                                        <td>Respon Berhasil</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <pre><code>{
{
    "status": {
        "code": "400",
        "error": "Invalid Token."
    }
}
                                        
}</code></pre>
                                        </td>
                                        <td>Respon Gagal.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section id="GetSymptoms">
                    <h3>2. GetSymptoms</h3>
                    <P>Method GetSymptoms bertujuan untuk mengambil seluruh data gejala penyakit</P>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#url2"
                                type="button" role="tab" aria-controls="home" aria-selected="true">URL</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#parameter2"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Parameter</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contoh2"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Contoh
                                respon</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="url2" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Metode</th>
                                        <th>URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GET</td>
                                        <td>.../api/getsymptoms</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="parameter2" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Method</th>
                                        <th>Parameter</th>
                                        <th>Wajib</th>
                                        <th>Tipe</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GET</td>
                                        <td>API Token</td>
                                        <td>Ya</td>
                                        <td>String</td>
                                        <td>Token API</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="contoh2" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Contoh</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <pre><code>{
"status": {
    "code": "200",
    "description": "Request Valid"
},
"results": [
    {
        "id": 1,
        "disease": "pain chest"
    },
    {
        "id": 2,
        "disease": "shortness of breath"
    },
    {
        "id": 3,
        "disease": "dizziness"
    }
]

                                  
}</code></pre>
                                        </td>
                                        <td>Respon Berhasil</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <pre><code>{
{
    "status": {
        "code": "400",
        "error": "Invalid Token."
    }
}
}</code></pre>
                                        </td>
                                        <td>Respon Gagal.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section id="contoh-respon">
                    <section id="Predict">
                        <h3>3. Predict</h3>
                        <p>Method predict ini bertujuan untuk melakukan prediksi berdasarkan tiga id gejala penyakit.
                        </p>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#url3" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">URL</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#parameter3" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Parameter</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#respon3" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Contoh respon</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="url3" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Metode</th>
                                            <th>URL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>POST</td>
                                            <td>.../api/perdict</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="parameter3" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Method</th>
                                            <th>Parameter</th>
                                            <th>Wajib</th>
                                            <th>Tipe</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>POST</td>
                                            <td>API Token</td>
                                            <td>Ya</td>
                                            <td>String</td>
                                            <td>Token API</td>
                                        </tr>
                                        <tr>
                                            <td>POST</td>
                                            <td>id1</td>
                                            <td>Ya</td>
                                            <td>Int</td>
                                            <td>ID salah satu gejala</td>
                                        </tr>
                                        <tr>
                                            <td>POST</td>
                                            <td>id2</td>
                                            <td>Ya</td>
                                            <td>Int</td>
                                            <td>ID salah satu gejala</td>
                                        </tr>
                                        <tr>
                                            <td>POST</td>
                                            <td>id3</td>
                                            <td>Ya</td>
                                            <td>Int</td>
                                            <td>ID salah satu gejala</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="respon3" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Contoh</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <pre><code>{
    {
        "status": 
        {
            "code": "200",
            "description": "Request Valid."},
     
        "results": [
            {"disease_name": "hypertensive disease" },
            {"disease_name": "hyperlipidemia"}
        ]
    }
    }</code></pre>
                                            </td>
                                            <td>Respon Berhasil</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <pre><code>{
    {
        "status": {
            "code": "400",
            "error": "Invalid Token."
        }
    }
    }</code></pre>
                                            </td>
                                            <td>Respon Gagal.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @if(session('notif'))
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-middle',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: 'Akun baru telah dibuat!'
    })
    </script>
    @endif

    <script>
    const toggle = document.querySelector(".toggle"),
        input = document.querySelector("input");
    toggle.addEventListener("click", () => {
        if (input.type === "password") {
            input.type = "text";
            toggle.classList.replace("uil-eye-slash", "uil-eye");
        } else {
            input.type = "password";
        }
    })
    </script>


</body>

</html>