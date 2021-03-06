<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payrolls</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>

<body>
    <div class="container mx-auto">
        <div class="my-5">
            <table id="payroll-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Partner</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    
    <div id="modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payroll</h5>
                </div>
                <div class="modal-body">
                    <h3 id="modal-payroll-id" class="text-center"></h3>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>
    <script>
        const modal = new bootstrap.Modal(document.getElementById('modal'));

        $(function() {
            $('#payroll-table').DataTable({
                serverSide: true,
                ajax: '/json/payrolls',
                lengthMenu: [[25], [25]],
                columns: [
                    { data: 'id' },
                    { data: 'code' },
                    { data: 'partner.name' },
                    { data: 'status' },
                    { data: 'id',  render: (id) => `<button class="btn btn-info text-white" type="button" data-id="${id}">Click Me!</button>`},
                ],
            });

            $('#payroll-table tbody').on('click',  'button',  (e) => {
                const id = e.target.getAttribute('data-id');

                $('#modal-payroll-id').text(id);

                modal.toggle();
            });
        });
    </script>
</body>

</html>