<div class="card my-4">
  <div class="card-header">Student Payments</div>

  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Month Year</th>
          <th>Paid At</th>
          <th>Operator</th>
        </tr>
      </thead>
      <tbody>
        @if (count($studentPayments))
          @php
            $no = 1;
          @endphp
          @foreach ($studentPayments as $payment)
            <tr>
              <td>{{ $no++ }}</td>
              <td>
                {{ date('F', mktime(0, 0, 0, $payment->month, 1)) }}
                {{ $payment->year }}
              </td>
              <td>{{ $payment->paid_at }}</td>
              <td>{{ $payment->user->name }}</td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="99">No Data</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
