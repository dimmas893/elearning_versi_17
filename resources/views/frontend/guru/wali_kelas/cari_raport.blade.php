@extends('layouts.template_guru')
@section('contents')
    <x-alert />
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-body">
                     {{-- <div class="nav-item">
                        <form action="" method="get" class="site-block-top-search" >
                            @csrf
                            <span class="icon icon-search2"></span>
                            <input type="text" class="form-control border-0" name="cari" placeholder="Search">
                        </form>
                    </div> --}}
                    {{-- <a href="{{ route('raport') }}" class="btn btn-primary">kembali</a> --}}
                      <form action="{{ route('wali_kelas_raport_cari') }}" method="get" class="site-block-top-search" >
                        @csrf
                       <div class="row">
                            <div class="col-2">
                                <label>pilih tahun ajaran</label>
                                 <select class="form-control" name="cari" id="cari">
                                    <option class="form-control" value="2020">2020</option>
                                    <option class="form-control" value="2021">2021</option>
                                    <option class="form-control" value="2022">2022</option>
                                    <option class="form-control" value="2023">2023</option>
                                    <option class="form-control" value="2024">2024</option>
                                    <option class="form-control" value="2025">2025</option>
                                </select>
                            </div>
                             <div class="col-2">
                                <label>pilih semester</label>
                                <select class="form-control" name="semester" id="semester">
                                    <option class="form-control" value="semester 1 ganjil">semester 1 ganjil</option>
                                    <option class="form-control" value="semester 1">semester 1</option>
                                    <option class="form-control" value="semester 2 ganjil">semester 2 ganjil</option>
                                    <option class="form-control" value="semester 2">semester 2</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary mt-2 mb-2" value="cari">
                    </form>
                    <h2>Raport</h2>
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>nisn</th>
                                    <th>Kelas</th>
                                    <th>nilai tugas</th>
                                    <th>nilai ulangan</th>
                                    <th>nilai ujian</th>
                                    <th>nilai raport</th>
                                    <th>semester</th>
                                    <th>Tahun Ajaran</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($raport as $p)
                                    <tr>
                                        <td>{{$p->siswa->name}}</td>
                                        <td>{{$p->siswa->nisn}}</td>
                                        <td>{{$p->kelas->kelas}}</td>
                                        <td>
                                            @if($p->nilai_tugas !== null)
                                                {{$p->nilai_tugas}}
                                            @endif
                                            @if($p->nilai_tugas == null)
                                                <p style="color:red">belum ada nilai</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->nilai_ulangan !== null)
                                                {{$p->nilai_ulangan}}
                                            @endif
                                            @if($p->nilai_ulangan == null)
                                                <p style="color:red">belum ada nilai</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->nilai_ujian !== null)
                                                {{$p->nilai_ujian}}
                                            @endif
                                            @if($p->nilai_ujian == null)
                                                <p style="color:red">belum ada nilai</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->nilai_raport !== null)
                                                {{$p->nilai_raport}}
                                            @endif
                                            @if($p->nilai_raport == null)
                                                <p style="color:red">otomatis terisi jika syarat terpenuhi</p>
                                            @endif
                                        </td>
                                        <td>{{$p->semester}}</td>
                                        <td>{{$p->tahun_ajaran}}</td>
                                        <td><a href="{{ route('wali_kelas_raport_cari_id', $p->id) }}" class="btn btn-primary">kasih nilai</a></td>
                                    </tr>
                                @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection