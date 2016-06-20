angular.module('LMS').directive('myTable', function() {
  function link(scope, element, attrs) {

    // apply DataTable options, use defaults if none specified by user
    var options = {};
    if (attrs.myTable.length > 0) {
        options = scope.$eval(attrs.myTable);
    } else {
        options = {
          "processing": true,
          "serverSide": true,
          "ajax": '/admin/user/read',
          "dom" : "<'row'<'col-sm-6'l><'col-sm-3 pull-right'f>>" +
"<'row'<'col-sm-12'tr>>" +
"<'row'<'col-sm-5'i><'col-sm-7 pull-right'p>>",
          "columns": [
            { data: 'id', name: 'id',searchable: false,
            orderable: false },
            { data: 'username', name: 'username' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'role', name: 'role' },
            { defaultContent: 'a', name: 'action',searchable:false }
          ]
        };
    }

    if (attrs.actionDef) {
      options["fnCreatedRow"] = scope.$eval(attrs.actionDef);
  }
    // function( nRow, aData, iDataIndex ) {
    //   // Bold the grade for all 'A' grade browsers
    //     var button  = '<div class="btn-group">'+
    //         '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
    //           '  <i class="fa fa-angle-down"></i></button>'+
    //         '<ul class="dropdown-menu" role="menu">'+
    //             '<li><a href="#addUserModal" data-toggle="modal" ng-click="updateModal('+aData["id"]+',"'+aData["name"]+'","'+aData["username"]+'","'+aData["email"]+'","'+aData["address"]+'","'+aData["phone"]+'","'+aData["role"]+'")"><i class="icon-docs"></i> Edit </a></li>'+
    //             '<li><a href="javascript:;"><i class="icon-tag"></i> Delete </a></li>'+
    //         '</ul></div>';
    //     $('td:eq(6)', nRow).html( button );
    // }



    var dataTable =   element.DataTable(options);
    dataTable.on( 'order.dt search.dt', function () {
        dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


      // watch for any changes to our data, rebuild the DataTable
        scope.$watch(attrs.aaData, function(value) {
                dataTable.draw();
        });
    }

    return {
      link: link
    };

   });
