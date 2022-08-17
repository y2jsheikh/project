<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="sample_1" role="grid"
       aria-describedby="sample_1_info">
    <thead>
    <tr role="row">
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="0"> Sr#</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> FY</th>
        <th class="" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" data-column-index="3"> Actual Expenditure</th>
    </thead>
    <tbody>

    @if(is_array($result) && count($result) > 0)
            <?php
            $i = 1;
            ?>
            @foreach ($result as $r)
                <?php
                $fiscal_year_start = $r->fiscal_year - 1;
                $fiscal_year = $fiscal_year_start." - ".$r->fiscal_year;
                ?>
            <tr role="row">
                <td> {{$i}}</td>
                <td> {{$fiscal_year}} </td>
                <td> {{$r->actual_expend}}</td>
            </tr>
            <?php
            $i++;
            ?>
        @endforeach
    @else
        <tr>
            <th scope="row" colspan="3">
                <div style="color:black;text-align: center; " class="alert " role="alert">
                    <strong>NO DATA FOUND</strong>
                </div>
            </th>
        </tr>
    @endif

    </tbody>
</table>