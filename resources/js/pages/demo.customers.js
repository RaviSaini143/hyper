/**
 * Theme: Hyper - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes
 * Module/App: Customers demo page
 */

import DataTable from "datatables.net";
$.fn.dataTable = DataTable;
DataTable(window, window.$);


import re from 'datatables.net-responsive/js/dataTables.responsive.min.js';
re();
import bs5 from 'datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js';
bs5();
import cb from 'jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js';
cb();
import bs from 'datatables.net-bs5/js/dataTables.bootstrap5.min.js';
bs();

$(document).ready(function() {
  "use strict";

  // Default Datatable
  $("#products-datatable").DataTable({
    language: {
      paginate: {
        previous: "<i class='mdi mdi-chevron-left'>",
        next: "<i class='mdi mdi-chevron-right'>"
      },
      info: "Showing customers _START_ to _END_ of _TOTAL_",
      lengthMenu:
        "Display <select class='form-select form-select-sm ms-1 me-1'>" +
        '<option value="10">10</option>' +
        '<option value="20">20</option>' +
        '<option value="-1">All</option>' +
        "</select> customers"
    },
    columnDefs: [
      {
          targets: -1,
          className: 'dt-body-right'
      }],
    pageLength: 10,
    columns: [
      {
        orderable: false,
        render: function(data, type, row, meta) {
          if (type === "display") {
            data =
              '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes"><label class="form-check-label">&nbsp;</label></div>';
          }
          return data;
        },
        checkboxes: {
          selectRow: true,
          selectAllRender:
            '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes"><label class="form-check-label">&nbsp;</label></div>'
        }
      },
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: false }
    ],
    select: {
      style: "multi"
    },
    order: [[5, "asc"]],
    drawCallback: function() {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
      $('#products-datatable_length label').addClass('form-label');


      // Col add & remove
      var filterDiv = document.querySelector('.dataTables_wrapper .row');
      filterDiv.querySelectorAll('.col-md-6').forEach(function(element){
        element.classList.add('col-sm-6');
        element.classList.remove('col-sm-12');
        element.classList.remove('col-md-6');
      });

    }
  });
});
