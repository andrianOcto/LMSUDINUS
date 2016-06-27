angular.module('LMS').directive('mySelect', function() {
  function link(scope, element, attrs) {

    var value = "";

    if (attrs.mySelect.length > 0) {
        value = scope.$eval(attrs.myTable);
    } else {
        value = undefined;

      }

    // apply DataTable options, use defaults if none specified by user
    var dataTable =   element.select2({
      placeholder: 'Select course',

    });
    }


    return {
      require: 'ngModel',
      link: link
    };

   });
