@extends('layouts/master')

@section('content')
<div class="box">
  <!-- /.box-header -->
  
  <div class="box-body">
  	<br>
	<center>
  		<a href="/laporan/export" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
	</center>
	<br>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Project</th>
        <th>No PO</th>
        <th>No Invoice</th>
        <th>Jumlah Tagihan</th>
        <th>Tanggal Invoice</th>
        <th>Status</th>
      </tr>
      </thead>
      <tbody>
      @php
          $i = 1
      @endphp
      @foreach($laporan as $l)
      <tr>
        <td>{{$i}}</td>
        <td>{{$l->nama_project}}</td>
        <td>{{$l->no_purchase_order}}</td>
        <td>{{$l->no_invoice}}</td>
        <td>
          @php
              $terbayar = 0;
              $hasil = 0;
          @endphp
          @foreach($l->pembayaran as $p)
            @php
                $terbayar = $terbayar + $p->jumlah_pembayaran
            @endphp
          @endforeach
          @php
              $hasil = $l->nominal_purchase_order - $terbayar;
          @endphp
          {{$hasil}}
        </td>
        <td>{{$l->tgl_invoice}}</td>
        <td>{{$l->progress}}</td>
      </tr>
      @php
          $i++;
      @endphp
      @endforeach
      </tbody>
      <tfoot>
      <tr>
          <th>No</th>
          <th>Project</th>
          <th>No PO</th>
          <th>No Invoice</th>
          <th>Jumlah Tagihan</th>
          <th>Tanggal Invoice</th>
          <th>Status</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection