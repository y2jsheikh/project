<table class="table table-hover">
    <thead>
    <tr>
        <th> Sr No </th>
        <th> FY </th>
        <th> Date </th>
        <th> Component </th>
        <th> Quarter </th>
        <th> Amount (<small class="text-muted">PKR</small>) </th>
        <th> Foreign Aid </th>
        <th> Action </th>
    </tr>
    </thead>
    <tbody>
    @php
        $i = 1;
        $alloc_amount = 0;
        $foreign_alloc_amount = 0;
    @endphp
    @if(is_array($result) && count($result) > 0)
        @foreach ($result as $r)

            <?php
            $fiscal_year_start = $r->fiscal_year - 1;
            $fiscal_year = $fiscal_year_start." - ".$r->fiscal_year;

            $alloc_amount = $alloc_amount + $r->fy_amount;
            $foreign_alloc_amount = $foreign_alloc_amount + $r->foreign_fy_amount;
            ?>

            <tr role="row">
                <td> {{$i}} </td>
                <td> {{$fiscal_year}} </td>
                <td> {{$r->fy_date}} </td>
                <td> {{$r->component}} </td>
                <td> {{$r->quarter}} </td>
                <td> {{$r->fy_amount}} </td>
                <td> {{$r->foreign_fy_amount}} (<small class="text-muted">{{$r->currency}}</small>) </td>
                <td>
                    <div class="btn-group">
                        <a onClick="return confirm('Are you sure you want to update?');" title="Edit" href="{{url('edit_fy_util', $r->id)}}" class="btn btn-info" id="btn-view"><i class="fa fa-edit"></i> </a>
                        <a onClick="return confirm('Are you sure you want to delete?');" title="Delete" href="#" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                    </div>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        <tr>
            <th colspan="5" class="text-center">Total</th>
            <td>{{$alloc_amount}}</td>
            <td>{{$foreign_alloc_amount}}</td>

        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
    @else
        <tr>
            <th scope="row" colspan="9">
                <div style="color:#FFFFFF;text-align: center; background-color: #ff0000;" class="alert alert-danger" role="alert">
                    <strong>No Data Found</strong>
                </div>
            </th>
        </tr>
    @endif

    </tbody>
</table>

<div class="pull-right">
    @if(is_array($result) && count($result) > 0)
        {{ $links }}
    @endif
</div>

<script>
    @if(is_array($result) && count($result) > 0)
    $("#sample_1_length").show();
    @else
    $("#sample_1_length").hide();
    @endif
</script>