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
          "dom": '<"top"i>rt<"bottom"flp><"clear">',
          "columns": [
            { data: 'id', name: 'id' }
          ]
        };
    }


      element.DataTable(options);
    }

    return {
      link: link
    };

   });
