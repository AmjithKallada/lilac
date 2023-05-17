<!DOCTYPE html>
<html>

<head>
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body{
            background: #ddd;
        }
        .box-sec {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px 20px;
            padding: 20px;
            height: 500px;
            overflow: auto;
        }

        .single-box {
            Padding: 20px;
            background: #fff;
        }
        .search{
            width: 100%;
            padding: 10px;
        }
        .wrapper{
            background: #ddd;
            width: 1170px;
            max-width: 1170px;
            margin: auto;
            margin-top: 20px;
        }
        .search-key{
            margin-bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="search-key">
            <h4>Search</h4>
            <input type="text" class="search" name="searchKey" id="searchKey" placeholder="Search name/designation/department">

        </div>
        <div class="box-sec" id="datas">
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>

        $(document).on('keyup','#searchKey',function()
        {
            dataFetch()
        })

        $(document).ready(function() {
            dataFetch();
        });

        function dataFetch()
        {
            var searchKey =$('#searchKey').val();
            $.ajax({
                type: "POST",
                url: "{{route('search-user')}}",
                data: {
                    '_token' : "{{ csrf_token() }}",
                    'search_key' : searchKey,
                },
                dataType: "json",
                success: function (res) {
                    var html = '';
                    var val = $('#searchKey').val();

                    res.data.sort(function(a, b) {
                    var temp1 = a.name.toUpperCase(); // ignore upper and lowercase
                    var temp2 = b.name.toUpperCase(); // ignore upper and lowercase
                    if (temp1 < temp2) {
                        return -1;
                    }
                    if (temp1 > temp2) {
                        return 1;
                    }
                    // names must be equal
                    return 0;
                    });

                    $.each(res.data, function(index, value) {
                    html += '<div class="single-box">';
                    html += '<h4>' + value.name + '</h4>';
                    html += '<h6>' + value.designation + '</h6>';
                    html += '<h6>' + value.department + '</h6>';
                    html += '</div>';
                    });
                    $('#datas').html(html);
                }
            });
        }
    </script>
</body>

</html>
