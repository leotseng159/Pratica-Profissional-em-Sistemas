
<html>
<script>
$(document).ready(function() {
  //Fixing jQuery Click Events for the iPad
  var ua = navigator.userAgent,
    event = (ua.match(/iPad/i)) ? "touchstart" : "click";
  if ($('.table').length > 0) {
    $('.table .header').on(event, function() {
      $(this).toggleClass("active", "").nextUntil('.header').css('display', function(i, v) {
        return this.style.display === 'table-row' ? 'none' : 'table-row';
      });
    });
  }
})
</script>

<style>
body {
  color: #6a6c6f;
  background-color: #f1f3f6;
  margin-top: 30px;
}

.container {
  max-width: 960px;
}

.table>tbody>tr.active>td,
.table>tbody>tr.active>th,
.table>tbody>tr>td.active,
.table>tbody>tr>th.active,
.table>tfoot>tr.active>td,
.table>tfoot>tr.active>th,
.table>tfoot>tr>td.active,
.table>tfoot>tr>th.active,
.table>thead>tr.active>td,
.table>thead>tr.active>th,
.table>thead>tr>td.active,
.table>thead>tr>th.active {
  background-color: #fff;
}

.table-bordered > tbody > tr > td,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > td,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > thead > tr > th {
  border-color: #e4e5e7;
}

.table tr.header {
  font-weight: bold;
  background-color: #fff;
  cursor: pointer;
  -webkit-user-select: none;
  /* Chrome all / Safari all */
  -moz-user-select: none;
  /* Firefox all */
  -ms-user-select: none;
  /* IE 10+ */
  user-select: none;
  /* Likely future */
}

.table tr:not(.header) {
  display: none;
}

.table .header td:after {
  content: "\002b";
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  color: #999;
  text-align: center;
  padding: 3px;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
}

.table .header.active td:after {
  content: "\2212";
}
  </style>


	<body>

   <div class="container">
  <table class="table table-bordered">
    <tr class="header">
      <td colspan="2">Header 1</td>
    </tr>
    <tr>
      <td>data</td>
      <td>data</td>
    </tr>
    <tr>
      <td>data</td>
      <td>data</td>
    </tr>
    <tr class="header">
      <td colspan="2">Header 2</td>
    </tr>
    <tr>
      <td>date</td>
      <td>data</td>
    </tr>
    <tr>
      <td>data</td>
      <td>data</td>
    </tr>
    <tr>
      <td>data</td>
      <td>data</td>
    </tr>
    <tr class="header">
      <td colspan="2">Header 3</td>
    </tr>
    <tr>
      <td>date</td>
      <td>data</td>
    </tr>
    <tr>
      <td>data</td>
      <td>data</td>
    </tr>
    <tr>
      <td>data</td>
      <td>data</td>
    </tr>
    <tr class="header">
      <td colspan="2">Header 4</td>
    </tr>
    <tr>
      <td>date</td>
      <td>data</td>
    </tr>
    <tr>
      <td>data</td>
      <td>data</td>
    </tr>
    <tr>
      <td>data</td>
      <td>data</td>
    </tr>
  </table>
</div>
	</body>

</html>