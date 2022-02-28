
<script type="text/javascript">

    var dataTable = $("#myTable");
    var rowNumber = {{ $row }};
    var columnNumber= {{ $col }};
    if(cols.indexOf('col-' + columnNumber) !== -1){}
    else
    {
        cols.push('col-' + columnNumber);
    }
    var all_col = document.getElementsByClassName('col-' + columnNumber);
    var tbl = document.getElementById('myTable');
    var rows = tbl.getElementsByTagName('th');
    rows[0].classList.remove('d-none');
    rows[13].classList.remove('d-none');
    dataTable[0].rows[rowNumber].cells[columnNumber].innerHTML = '$ {{  number_format($total, 0, '', '.')}} <span style="color: red; float:right">{{ $count }}</span>';
</script>




