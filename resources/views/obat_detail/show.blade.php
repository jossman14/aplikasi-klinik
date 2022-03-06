@extends('layout.app')

@section('judul-halaman')
Halaman Detail Pasien
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Pasien Detail</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Pasien</a>
                <a href="#!" class="breadcrumb">Pasien Detail</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        {{-- {{dd($singleObatDetail) }} --}}
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content row">
                        <div class="col s12 m6">

                            {{-- +"id": 26
  +"min_stock": 10
  +"max_stock": 1000
  +"stock": 600
  +"tgl_beli": "2022-03-01 00:00:00"
  +"expire": "2025-12-16 00:00:00"
  +"batch": "HY777878"
  +"harga_beli": 10000
  +"harga_jual": 11000
  +"nama_jenis_obat": "Tablet"
  +"nama_satuan_obat": "PAK"
  +"nama_penyedia_obat": "Penyedia Obat 56927" --}}

                            <small>No. Batch</small>
                            <h6>{{ $singleObatDetail->batch }}</h6>
                            <small>Nama</small>
                            <h6>{{ $singleObatDetail->nama }}</h6>
                            <small>Tanggal Beli</small>
                            <h6 id="tgl_lahir_show">{{ $singleObatDetail->tgl_beli }}</h6>
                            <small>Tanggal Kadaluarsa</small>
                            <h6 id="tgl_lahir_show">{{ $singleObatDetail->expire }}</h6>
                            <small>Jumlah Stok</small>
                            <h6>{{ $singleObatDetail->stock }}</h6>
                            <small>Stok Minimal</small>
                            <h6>{{ $singleObatDetail->min_stock }}</h6>



                        </div>
                        <div class="col s12 m6">
                            <small>Stok Maksimal</small>
                            <h6>{{ $singleObatDetail->max_stock }}</h6>
                            <small>Jenis Obat</small>
                            <h6>{{ $singleObatDetail->nama_jenis_obat }}</h6>
                            <small>Satuan Obat</small>
                            <h6>{{ $singleObatDetail->nama_satuan_obat }}</h6>
                            <small>Penyedia Obat</small>
                            <h6>{{ $singleObatDetail->nama_penyedia_obat }}</h6>
                            <small>Harga Beli</small>
                            <h6>{{ $singleObatDetail->harga_beli }}</h6>
                            <small>Harga Jual</small>
                            <h6>{{ $singleObatDetail->harga_jual }} <span class="p-l-5 p-r-5 white-text {{ $singleObatDetail->harga_jual < $singleObatDetail->harga_beli ? 'red' : 'green'}}"> <small><i class="ti-arrow-{{ $singleObatDetail->harga_jual < $singleObatDetail->harga_beli ? 'down' : 'up'}}"></i></small> {{ round((($singleObatDetail->harga_jual - $singleObatDetail->harga_beli)/$singleObatDetail->harga_beli) * 100,2) }}%</span></h6>

                        </div>


                    </div>
                    <hr>

                </div>
            </div>
            <div class="col s12">
                <div class="card">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s4"><a class="active" href="#timeline">Timeline</a></li>
                                <li class="tab col s4"><a href="#profile">Profile</a></li>
                                <li class="tab col s4"><a href="#settings">Settings</a></li>
                            </ul>
                        </div>
                        <div id="timeline" class="col s12">
                            <div class="card-content">
                                <div class="profiletimeline">
                                    <div class="sl-item">
                                        <div class="sl-left"> <img
                                                src="{{ asset('template') }}/assets/images/users/1.jpg"
                                                alt="user" class="circle" /> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="">John Doe</a> <span
                                                    class="sl-date">5 minutes ago</span>
                                                <p>assign a new task <a href="javascript:void(0)"> Design
                                                        weblayout</a></p>
                                                <div class="row">
                                                    <div class="col l3 m6 m-b-20"><img
                                                            src="{{ asset('template') }}/assets/images/big/img1.jpg"
                                                            class="responsive-img radius" /></div>
                                                    <div class="col l3 m6 m-b-20"><img
                                                            src="{{ asset('template') }}/assets/images/big/img2.jpg"
                                                            class="responsive-img radius" /></div>
                                                    <div class="col l3 m6 m-b-20"><img
                                                            src="{{ asset('template') }}/assets/images/big/img3.jpg"
                                                            class="responsive-img radius" /></div>
                                                    <div class="col l3 m6 m-b-20"><img
                                                            src="{{ asset('template') }}/assets/images/big/img4.jpg"
                                                            class="responsive-img radius" /></div>
                                                </div>
                                                <div class="like-comm"> <a href="javascript:void(0)" class="m-r-10">2
                                                        comment</a> <a href="javascript:void(0)" class="m-r-10"><i
                                                            class="fa fa-heart text-danger"></i> 5 Love</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img
                                                src="{{ asset('template') }}/assets/images/users/2.jpg"
                                                alt="user" class="circle" /> </div>
                                        <div class="sl-right">
                                            <div> <a href="javascript:void(0)" class="">John Doe</a> <span
                                                    class="sl-date">5 minutes ago</span>
                                                <div class="row m-t-30">
                                                    <div class="col s3">
                                                        <img src="{{ asset('template') }}/assets/images/big/img1.jpg"
                                                            alt="user" class="responsive-img radius" />
                                                    </div>
                                                    <div class="col s9">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                            elit. Integer nec odio. Praesent libero. Sed cursus
                                                            ante dapibus diam.</p>
                                                        <a href="javascript:void(0)"
                                                            class="waves-effect waves-light btn"> Design
                                                            weblayout</a>
                                                    </div>
                                                </div>
                                                <div class="like-comm m-t-20"> <a href="javascript:void(0)"
                                                        class="m-r-10">2 comment</a> <a href="javascript:void(0)"
                                                        class="m-r-10"><i class="fa fa-heart red-text"></i> 5 Love</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img
                                                src="{{ asset('template') }}/assets/images/users/3.jpg"
                                                alt="user" class="circle" /> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="">John Doe</a> <span
                                                    class="sl-date">5 minutes ago</span>
                                                <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Integer nec odio. Praesent libero. Sed
                                                    cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh
                                                    elementum imperdiet. Duis sagittis ipsum. Praesent mauris.
                                                    Fusce nec tellus sed augue semper </p>
                                            </div>
                                            <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="m-r-10">2
                                                    comment</a> <a href="javascript:void(0)" class="m-r-10"><i
                                                        class="fa fa-heart text-danger"></i> 5
                                                    Love</a> </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img
                                                src="{{ asset('template') }}/assets/images/users/4.jpg"
                                                alt="user" class="circle" /> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="">John Doe</a> <span
                                                    class="sl-date">5 minutes ago</span>
                                                <blockquote class="m-t-10">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="profile" class="col s12">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col m3 b-r"> <strong>Full Name</strong>
                                        <br>
                                        <p>John Doe</p>
                                    </div>
                                    <div class="col m3 b-r"> <strong>Mobile</strong>
                                        <br>
                                        <p>(123) 456 7890</p>
                                    </div>
                                    <div class="col m3 b-r"> <strong>Email</strong>
                                        <br>
                                        <p>john@admin.com</p>
                                    </div>
                                    <div class="col m3"> <strong>Location</strong>
                                        <br>
                                        <p>New York</p>
                                    </div>
                                </div>
                                <hr>
                                <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                    arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                    dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                    elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
                                    porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. It has survived not only five centuries </p>
                                <p>It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem Ipsum passages, and more recently with desktop publishing
                                    software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <h5 class="card-title">Skill Set</h5>
                                <hr>
                                <h6 class="font-light m-t-30">Wordpress <span class="pull-right">80%</span></h6>
                                <div class="progress">
                                    <div class="determinate" style="width: 70%"></div>
                                </div>
                                <h6 class="font-light m-t-30">HTML 5 <span class="pull-right">90%</span></h6>
                                <div class="progress">
                                    <div class="determinate" style="width: 70%"></div>
                                </div>
                                <h6 class="font-light m-t-30">jQuery <span class="pull-right">50%</span></h6>
                                <div class="progress">
                                    <div class="determinate" style="width: 70%"></div>
                                </div>
                                <h6 class="font-light m-t-30">Photoshop <span class="pull-right">70%</span></h6>
                                <div class="progress">
                                    <div class="determinate" style="width: 70%"></div>
                                </div>
                            </div>
                        </div>
                        <div id="settings" class="col s12">
                            <div class="card-content">
                                <form>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" value="Jon Doe">
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email" type="email" value="jon@doe.com">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="password" type="password" value="123456">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="number" type="text" value="123 456 7890">
                                            <label for="number">Phone No</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="message"
                                                class="materialize-textarea">Hi, I am Jon Doe</textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select>
                                                <option value="" disabled>Choose Country</option>
                                                <option value="1">USA</option>
                                                <option value="2" selected>Spain</option>
                                                <option value="3">India</option>
                                            </select>
                                            <label>Select Country</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn teal waves-effect waves-light" type="submit"
                                                name="action">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <footer class="center-align m-b-30">Theme designed and developed by Materialart and WrapPixel. System Developed by JozApp &copy; <span id="yearFooter"></span></footer>
</div>
@endsection

@section('halaman-js')
<script>
    $(document).ready(function () {
        function dateFormat(idName, value) {
            var createdDate = new Date(value);
            // var date1 = crea
            var date = createdDate.toLocaleString("id-ID", {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            $(String(idName)).html(date);
            // console.log(String(idName))

        }

        dateFormat("#tgl_lahir_show", $("#tgl_lahir_show").html())



    });

</script>
@endsection

@section('halaman-css')


@endsection
