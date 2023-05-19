@extends('layouts.panel')
@section('title', $project->title . ' - ' . $subProject->title)
@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Hata Durumları</h3>
        <h4 class="page-title">Sistemde meydana gelebilecek <code>hata durumları</code> ve geriye dönecek
            olan hata mesaj
            durumlarını bu alandan görebilirsiniz.</h4>
        <div class="row">
            <div class="col-md-5">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Request</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tip</th>
                                    <th>Parametre</th>
                                    <th>Mesaj</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>status</td>
                                    <td>error</td>
                                    <td>Hataya ait açıklama mesajı.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END TABLE HOVER -->
            </div>
            <div class="col-md-7">
                <!-- TABLE HOVER -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">HTTP Durum Kodları</h3>
                    </div>
                    <div class="panel-body">
                        <pre>200 - Tamam Her şey beklendiği gibi çalıştı.
400 - Hatalı istek. Çoğunlukla gerekli olan bir parametrenin eksik olması nedeniyle kabul edilmez.
401 - Geçersiz/Yetkisiz API Token kodu.
402 - Parametreler geçerli fakat istek başarısız oldu.
403 - Yasaklanış yada pasife alınmış token kodu. İsteği gerçekleştirme izni yok.
404 - Bulunamadı! İstenen kaynak mevcut değil.
405 - Geçersiz method. Kaynak bir GET veya POST yöntemi bekliyor olabilir, ancak bir DELETE veya PUT yöntemi alırsa, yapılan istek 405 olarak reddedilecektir.
409 - Web sunucusu üzerinde önceden belitrilmiş bir kural veya versiyon farklılıklarından dolayı oluşan uyumsuzluğun neden olduğu hata mesajıdır.
429 - API Token kodu ile çok fazla istek yapıldı.
500, 502, 503, 504 - Sunucu Hataları! Yazılım tarafında bir şeyler ters gitti.</pre>
                    </div>
                </div>
                <!-- END TABLE HOVER -->
            </div>
        </div>
    </div>

@endsection
