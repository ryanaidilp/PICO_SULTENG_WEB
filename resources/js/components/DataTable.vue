<template>
  <section class="bg-white rounded-lg shadow-lg">
    <div
      class="table-wrapper-scroll-y table-wrapper-scroll-x my-custom-scrollbar"
    >
      <data-table
        id="table-vaccine-location"
        :header-fields="headerFields"
        :sort-field="sortField"
        :sort="sort"
        :data="items || []"
        :css="datatableCss"
        not-found-msg="Items not found"
        @on-update="dtUpdateSort"
      />
    </div>
    <hr />
    <p class="py-2 mx-8 my-auto text-sm text-justify text-gray-800">
      Menampilkan {{ formatNumber(start) }} - {{ formatNumber(end) }} data dari
      total {{ formatNumber(totalItems) }} data.
    </p>
    <hr />
    <div class="p-4 m-2 my-auto" style="display: flow-root">
      <!-- <div slot="ItemsPerPage" class="items-per-page"> -->
      <div class="mr-4 items-per-page" style="float: left">
        <items-per-page-dropdown
          :list-items-per-page="listItemsPerPage"
          :items-per-page="itemsPerPage"
          :css="itemsPerPageCss"
          @on-update="updateItemsPerPage"
        />
        <label>Data Per Halaman</label>
      </div>
      <!-- <template v-slot:pagination> -->
      <div style="float: right">
        <template>
          <pagination
            :page="currentPage"
            :total-items="totalItems"
            :items-per-page="itemsPerPage"
            :css="paginationCss"
            @on-update="changePage"
            @update-current-page="updateCurrentPage"
          />
        </template>
      </div>
    </div>
    <hr />

    <p class="py-4 mx-8 my-auto text-sm text-justify text-gray-800">
      <span class="text-gray-500">Keterangan:</span>
      <br />
      <slot name="notes"> </slot>
    </p>
  </section>
</template>
<script>
import { DataTable, ItemsPerPageDropdown, Pagination } from "v-datatable-light";
export default {
  components: {
    DataTable,
    Pagination,
    ItemsPerPageDropdown,
  },
  props: {
    headerFields: {
      type: Array,
      required: true,
    },
    data: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      sort: "asc",
      sortField: "tanggal",
      listItemsPerPage: [10, 20, 50, 100],
      start: 0,
      end: 10,
      itemsPerPage: 50,
      currentPage: 1,
      totalItems: 0,
      datatableCss: {
        table: "table table-bordered table-hover table-striped table-center",
        theadTh: "header-item",
        thWrapper: "th-wrapper",
        thWrapperCheckboxes: "th-wrapper checkboxes",
        arrowsWrapper: "arrows-wrapper",
        arrowUp: "arrow up",
        arrowDown: "arrow down",
        footer: "footer",
      },
      paginationCss: {
        paginationItem: "pagination-item",
        moveFirstPage: "move-first-page",
        movePreviousPage: "move-previous-page",
        moveNextPage: "move-next-page",
        moveLastPage: "move-last-page",
        pageBtn: "page-btn",
      },
      itemsPerPageCss: {
        select: "item-per-page-dropdown",
      },
      items: null,
    };
  },
  methods: {
    dtUpdateSort: function ({ sortField, sort }) {
      const sortedData = _.orderBy(this.data, [sortField], [sort]);
      const start = (this.currentPage - 1) * this.itemsPerPage;
      const end = this.currentPage * this.itemsPerPage;
      this.updateStartAndEnd();
      this.items = sortedData.slice(start, end);
    },
    updateItemsPerPage: function (itemsPerPage) {
      this.itemsPerPage = parseInt(itemsPerPage);
      if (itemsPerPage >= this.data.length) {
        this.items = this.data;
      } else {
        this.items = this.data.slice(0, itemsPerPage);
      }
      this.updateStartAndEnd();
    },
    changePage: function (currentPage) {
      this.currentPage = currentPage;
      const start = (currentPage - 1) * this.itemsPerPage;
      const end = currentPage * this.itemsPerPage;
      this.updateStartAndEnd();
      this.items = this.data.slice(start, end);
    },
    updateCurrentPage: function (currentPage) {
      this.currentPage = currentPage;
    },
    updateStartAndEnd() {
      this.start = Math.max(this.itemsPerPage * (this.currentPage - 1), 1);
      this.end = Math.min(
        this.itemsPerPage * this.currentPage,
        this.totalItems
      );
    },
    formatNumber(value) {
      return new Intl.NumberFormat("id-ID").format(value);
    },
  },
  mounted() {
    this.items = this.data;
    this.totalItems = this.data.length;
    this.updateStartAndEnd();
  },
};
</script>

<style>
.table tbody td {
  text-align: center;
}
.my-custom-scrollbar {
  position: relative;
  height: 500px;
  overflow-y: scroll;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
}
.table th,
.table td {
  padding: 0.75rem;
  vertical-align: center;
}
.table thead th:first-child {
  border-radius: 0.5rem 0px 0px 0px;
}
.table thead th:last-child {
  border-radius: 0px 0.5rem 0px 0px;
}

.table thead th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  background-color: rgb(37, 37, 37);
  vertical-align: bottom;
}
.table tbody + tbody {
  border-top: 2px solid #eceeef;
}
.table .table {
  background-color: #fff;
}
.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered td {
  border: 1px solid gray;
}
.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}
.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}
.table-hover tbody tr:hover {
  background-color: rgba(0, 0, 0, 0.075);
}
.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}
.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075);
}
.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
  background-color: rgba(0, 0, 0, 0.075);
}
.table-success,
.table-success > th,
.table-success > td {
  background-color: #dff0d8;
}
.table-hover .table-success:hover {
  background-color: #d0e9c6;
}
.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
  background-color: #d0e9c6;
}
.table-info,
.table-info > th,
.table-info > td {
  background-color: #d9edf7;
}
.table-hover .table-info:hover {
  background-color: #c4e3f3;
}
.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
  background-color: #c4e3f3;
}
.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #fcf8e3;
}
.table-hover .table-warning:hover {
  background-color: #faf2cc;
}
.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
  background-color: #faf2cc;
}
.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #f2dede;
}
.table-hover .table-danger:hover {
  background-color: #ebcccc;
}
.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
  background-color: #ebcccc;
}
.thead-inverse th {
  color: #fff;
  background-color: #292b2c;
}
.thead-default th {
  color: #fff;
  background-color: #292b2c;
}
.table-inverse {
  color: #fff;
  background-color: #292b2c;
}
.table-inverse th,
.table-inverse td,
.table-inverse thead th {
  border-color: #292b2c;
}
.table-inverse.table-bordered {
  border: 0;
}
.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}
.table-responsive.table-bordered {
  border: 0;
}
/* Datatable CSS */
.v-datatable-light .header-item {
  cursor: pointer;
  color: #fff;
  transition: color 0.15s ease-in-out;
  vertical-align: top;
  text-align: center;
  font-size: smaller;
  padding-top: 0.5rem;
  padding-bottom: 0.2rem;
  border: white 1px solid;
}
.v-datatable-light .header-item:hover {
  color: #337ab7;
}
.v-datatable-light .header-item.no-sortable {
  cursor: default;
}
.v-datatable-light .header-item.no-sortable:hover {
  color: #464646;
}
.v-datatable-light .header-item .th-wrapper {
  display: flex;
  width: 100%;
  height: 100%;
  font-weight: bold;
  justify-content: center;
  align-items: center;
}
.v-datatable-light .header-item .th-wrapper.checkboxes {
  justify-content: center;
}
.v-datatable-light .header-item .th-wrapper .arrows-wrapper {
  display: flex;
  flex-direction: column;
  margin-left: 10px;
  justify-content: space-between;
}
.v-datatable-light .header-item .th-wrapper .arrows-wrapper.centralized {
  justify-content: center;
}
.v-datatable-light .arrow {
  transition: color 0.15s ease-in-out;
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
}
.v-datatable-light .arrow.up {
  border-bottom: 5px solid white;
}
.v-datatable-light .arrow.up:hover {
  border-bottom: 5px solid #092749;
}
.v-datatable-light .arrow.down {
  border-top: 5px solid white;
}
.v-datatable-light .arrow.down:hover {
  border-top: 5px solid #092749;
}
.v-datatable-light .footer {
  display: flex;
  justify-content: space-between;
  width: 500px;
}
.v-datatable-light tbody {
  font-size: small;
}
/* End Datatable CSS */
/* Pagination CSS */
.v-datatable-light-pagination {
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  margin: 0;
  padding: 0;
  width: 300px;
  height: 30px;
}
.v-datatable-light-pagination .pagination-item {
  width: 30px;
  margin-right: 5px;
  font-size: 16px;
  transition: color 0.15s ease-in-out;
}
.v-datatable-light-pagination .pagination-item.selected {
  color: #092749;
}
.v-datatable-light-pagination .pagination-item .page-btn {
  background-color: transparent;
  outline: none;
  border: none;
  color: #337ab7;
  transition: color 0.15s ease-in-out;
}
.v-datatable-light-pagination .pagination-item .page-btn:hover {
  color: #092749;
}
.v-datatable-light-pagination .pagination-item .page-btn:disabled {
  cursor: not-allowed;
  box-shadow: none;
  opacity: 0.65;
}
/* END PAGINATION CSS */
/* ITEMS PER PAGE DROPDOWN CSS */
.item-per-page-dropdown {
  background-color: transparent;
  min-height: 30px;
  border: 1px solid #337ab7;
  border-radius: 5px;
  align-items: center;
  color: #337ab7;
}
.item-per-page-dropdown:hover {
  cursor: pointer;
}
/* END ITEMS PER PAGE DROPDOWN CSS */
</style>