<html>

<body>
    <h1>Profil Pegawai</h1>
    <p>Nama : {{ $username }}</p>
    <p>Umur : {{ $my_age }}</p>
    <p>Hobi : </p>
    @foreach ($hobbies as $hobby)
        <li>{{ $hobby }}</li>
    @endforeach

    <br>
    <p>Tanggal Harus Wisuda : {{ $tgl_harus_wisuda }}</p>
    <p>Sisa hari menuju wisuda : {{ $time_to_study_left }} hari</p>
    <p>Semester saat ini : {{ $current_semester }}</p>
    <p>Pesan : {{ $semester_message }}</p>
    <p>Cita - cita : {{ $future_goal }}</p>
</body>

</html>
