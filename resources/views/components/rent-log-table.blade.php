<div>
    <table class='table mb-0' id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Books</th>
                <th>Started Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($rent as $index => $item)
          <tr>
            <td>{{ $index + $rent->firstItem() }}</td>
            <td>{{ $item->user->username }}</td>
            <td>{{ $item->book->kode_buku }} - {{ $item->book->judul }}</td>
            <td>{{ $item->started_at }}</td>
            <td>{{ $item->ended_at }}</td>
            <td>{{ $item->actual_ended_date }}</td>
            @if ($item->actual_ended_date > $item->ended_at)  
            <td>
              <span class="badge bg-danger">Kena Denda</span>
            </td>
            @elseif ($item->actual_ended_date == NULL)
            <td>
              <span class="badge bg-blue">Belum Dikembalikan</span>
            </td>
            @else
            <td>
              <span class="badge bg-success">Sudah Dikembalikan</span>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
    </table>
</div>