@extends('result.include')
@section('backTitle')
All Marksheet
@endsection
@section('backIndex')
<style>
    /* main website */
.main-website {
  background-color: #fff;
  box-sizing: border-box;
  width: 100%;
  margin: 10px auto;
}
.secend-main-div {
  background-color: #eeeeee;
  box-sizing: border-box;
  margin-top: 21px;
  padding-top: 3px;
  padding-bottom: 14px;
}
.main-content {
  box-sizing: border-box;
  background-color: #fff;
  margin: 10px 59px;
  padding-top: 14px;
  padding-bottom: 33px;
  border-radius: 12px;
}
.header {
  border-radius: 42px 0px 0px;
  overflow: hidden;
}
/* logo part start */
.main-logo-part {
  background-color: #eceeee;
  text-align: center;
  padding: 31px 0px;
  box-sizing: border-box;
}


/*logo part end */

/* header-top start */
.header-top1{
  margin-bottom: -15px;
  margin-top: 20px;
}
.header-top1 p{
  font-weight: 400;
}
/* header-top end */
/* deafult css */
img{
    max-width: 100%;
}
p{
  margin: 0;
}

/* deafult css */
/* header part start */
/* header top start */
.header-top {
  background-position: right center;
  background-repeat: no-repeat ;
  padding-top: 11px;
  
  background-size: contain;
  
  padding-left: 14px;
}
.header-top h1,h2,h3,h4,h5,h6, {
    
  line-height: .4 !important;
  font-size: 28px;
  font-weight: bold;
}
/* header top end */
/* header middle start */

.header-middle h3 {
  color: white;
  font-size: 29px;
  font-weight: bold;
  padding-left: 15px;
  padding-top: 3px;
  padding-bottom: 10px;
  letter-spacing: 1px;
  word-spacing: 6px;
  padding-right: 58px;
  border-top: 1px solid lightgray;
  line-height: 26px;
  margin-bottom: 0;
}
/* header middle end */

/* header- buttom start */
.header-bottomm {
  
  padding: 6px 0;
  padding-right: 13px;
  box-sizing: border-box;
}
.header-bottomm p {
  margin: 0;
  font-weight: 600;
  color: white;
}
/* header- buttom end */
/* Result section start */
.result-text{

}
.result-text h2 {
  font-weight: bold;
  border-bottom: 4px solid #ddd;
  padding-bottom: 10px;
}
/* Result section end */

/* table section start*/
.table{

}
.table tr{
  background-color: #f0f0f0;
}
.table tr td {
  padding: 2px;
  border: 5px solid #fff;
}
/* table section end*/

/* grade table start */
.marksheet-table td{
  border-right: 3px solid white;
}
/* grade table end */

/* search link  start*/
.search-text a {
  font-weight: bold;
  font-size: 22px;
  color: #6d66b8;
}
/* search link  end*/

/* footer section start */

.footer-div {
  background-color: #eff3ee;
  border-top: 5px solid #78bf63;
  padding-top: 8px;
}
.copyright{

}
.copyright p {
  margin: 0;
  padding: 26px 19px;
  font-weight: 400;
}

/* footer-right */
.footer-right{

}
.footer-right p {
  margin: 0;
  padding: 26px 0px;
  font-weight: 400;
}

.footer-right-image {
  width: 121px;
}

/* footer section end */

/* footer bottom start */
.footter-bottom{
  margin-top: 40px;
  padding-bottom: 10px;
}
/* footer bottom end */
</style>
    <div class="container header-top1">
        <div class="row">
            <div class="col-lg-5">
                <p>08/03/2015</p>
            </div>
            <div class="col-lg-7">
                <p>Education Bord Bangladesh</p>
            </div>
        </div>
    </div>
    <div class="main-website">
        <div class="secend-main-div">
            <div class="main-content">
                <!-- header part start -->
                <div class="header">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-lg-2 p-0">
                                <div class="main-logo-part">
                                    <img src="https://i.ibb.co/58VBYrj/bd-logo.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 p-0">
                               <div class="row">
                                   <div class="col-lg-12">
                                        <div class="header-top text-center">
                                            <h5>Institute name</h5>
                                            <h4>Burichong,Cumilla</h4>
                                            <p class="fw-bold">instiution@gmail.com,10755048017</p>

                                        </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-lg-12">
                                       <div class="header-bottomm">
                                            <p class="text-right">Official Website of Education Bord</p>
                                       </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header part end-->

                <!-- Result section start -->
                <div class="result-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="result-text text-center mt-5">
                                    <h2>SSC/Dakhil/Equivalent Result Publication 2014</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mark sheet start -->
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class=" table-responsive">
                                    <table class="w-100 table-striped table-bordered text-center">
                                        <tr class=" table-dark text-dark">
                                        <td  rowspan="3"><b>Row</b></td>
                                            <td  rowspan="3"><b>Student Id</b></td>
                                            <td  rowspan="3"><b>Name</b></td>
                                            <td  colspan="32" ><b>Subject</b></td>
                                            <td rowspan="3"><b>Mark</b></td> 
                                            <td rowspan="3"><b>Grade</b></td>
                                            <td rowspan="3"><b>GPA</b></td>
                                        </tr>
                                        <tr class=" table-dark text-dark">
                                            <td colspan="4" ><b>Bangla</b></td>
                                            <td colspan="4"><b>English</b></td>
                                            <td colspan="4"><b>Mathematics</b></td>
                                            <td colspan="4"><b>SCIENCE</b></td>
                                            <td colspan="4"><b>CHEMISTRY</b></td>
                                            <td colspan="4"><b>PHYSICS</b></td>
                                            <td colspan="4"><b>HIGHER MATHEMATICS</b></td>
                                            <td colspan="4"><b>BIOLOGY</b></td>
                                        </tr>
                                        <tr class=" table-dark text-dark">
                                            <td><b>CQ</b></td>
                                            <td><b>MCQ</b></td>
                                            <td><b>P</b></td>
                                            <td><b>TOTAL</b></td>
                                            
                                            <td><b>CQ</b></td>
                                            <td><b>MCQ</b></td>
                                            <td><b>P</b></td>
                                            <td><b>TOTAL</b></td>
                                            
                                            <td><b>CQ</b></td>
                                            <td><b>MCQ</b></td>
                                            <td><b>P</b></td>
                                            <td><b>TOTAL</b></td>
                                            
                                            <td><b>CQ</b></td>
                                            <td><b>MCQ</b></td>
                                            <td><b>P</b></td>
                                            <td><b>TOTAL</b></td>
                                            
                                            <td><b>CQ</b></td>
                                            <td><b>MCQ</b></td>
                                            <td><b>P</b></td>
                                            <td><b>TOTAL</b></td>
                                            
                                            <td><b>CQ</b></td>
                                            <td><b>MCQ</b></td>
                                            <td><b>P</b></td>
                                            <td><b>TOTAL</b></td>
                                            
                                            <td><b>CQ</b></td>
                                            <td><b>MCQ</b></td>
                                            <td><b>P</b></td>
                                            <td><b>TOTAL</b></td>
                                            
                                            <td><b>CQ</b></td>
                                            <td><b>MCQ</b></td>
                                            <td><b>P</b></td>
                                            <td><b>TOTAL</b></td>
                                        </tr>
                                        <tr>
                                            <th >101</th>
                                            <td>2025000007</td>
                                            <td>Hasnat</td>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>

                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>

                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>

                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>

                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>

                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>

                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>

                                            <td>67</td>
                                            <td>89</td>
                                            <td>45</td>
                                            <td>78</td>

                                            <td>500</td>
                                            <td>A+</td>
                                            <td>5.00</td>
                                        </tr>
                                        <tr>
                                            <th class="w-25">101</th>
                                            <td>2025000007</td>
                                            <td>Hasnat</td>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>96</td>
                                            <td>78</td>
                                            <td>67</td>
                                            <td>89</td>
                                            <td>45</td>
                                            <td>78</td>
                                            <td >500</td>
                                            <td class="w-25">A+</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mark sheet end -->
                <!-- footer  section start -->
                <!-- footer  section end -->
            </div>
        </div>
    </div>


    <div class="footter-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p>www.educationboardresults.gov.bd/heigherresult.php</p>
                </div>
                <div class="col-lg-6">
                    <p class="text-right">1/1</p>
                </div>
            </div>
        </div>
    </div>
@endsection