<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <style type="text/css">
                            @media (max-width: 820px) {
                                .hospital-invoice-number-title {
                                    text-align: center;
                                    /*display: inline;*/
                                }

                                .hospital-invoice-qr-title {
                                    text-align: center;
                                }

                                .hospital-invoice-number-title .h3 {
                                    font-size: 1rem;
                                }

                                .content {
                                  display: flex;
                                  flex-direction: row;
                                }

                                .left {
                                  display: flex;
                                  flex-direction: column;
                                  flex: 3;
                                }

                                .div-1 {
                                  flex: 3;
                                }

                                .div-3 {
                                  flex: 0.5;
                                }

                                .div-4 {
                                  flex: 1;
                                  text-align: center;
                                }

                                .right {
                                  display: flex;
                                  flex-direction: column;
                                  flex: 3;
                                }

                                .hospital-text-justify {
                                    text-align: center;
                                }
                            }

                            @media (min-width: 821px) {
                                .hospital-invoice-qr-title {
                                    /*text-align: right;*/
                                    display: flex;
                                    align-items: flex-end;
                                }
                            }
                        </style>
                        
                        <div class="row mt-5"></div>
                        <?php $dr = dir(getcwd()); ?>
                        <?php echo $dr->path; ?>
                        <button id="download">Download PDF</button>
                        <div class="row" id="template_invoice">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row content">
                                            <!-- <span class="left"> -->
                                                <div class="col-md-6 div-1">
                                                    <div class="container mt-2 mb-2">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="media d-block d-sm-flex">
                                                                    <img src="public/assets/images/users/placeholder.jpg" alt="img" id="company_logo" class="avatar avatar-xl brround mr-3 align-self-center">
                                                                    <div class="media-body">
                                                                        <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo $settings->title ?></p>
                                                                        <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo $settings->address ?></p>
                                                                        <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo $settings->email ?></p>
                                                                        <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo $settings->phone ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-6 col-sm-6">
                                                                <img src="public/assets/images/users/placeholder.jpg" alt="img">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="h4 mb-0"><?php echo $settings->title ?></label>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </span> -->
                                            <!-- <span class="right"> -->
                                                <div class="col-md-6 div-3">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-6">
                                                            <div class="container mt-2 mb-2">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="media d-block d-sm-flex">
                                                                            <div class="media-body hospital-invoice-number-title">
                                                                                <p class="h3 mg-b-5 mb-0 tx-inverse tx-15"><?php echo lang('hospital').' '.lang('invoice'); ?></p>
                                                                                <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo lang('invoice').' # '.$payment->invoice_number;?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-lg-6">
                                                            <div class="container mt-2 mb-2">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="media d-block d-sm-flex">
                                                                            <div class="media-body hospital-invoice-qr-title">
                                                                                <img src="https://www.researchgate.net/profile/Alexander-Rassau/publication/224204651/figure/fig1/AS:302711959506947@1449183563237/An-example-of-QR-code.png" id="qr_logo">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md col-sm col-lg div-4">
                                                    
                                                </div> -->
                                            <!-- </span> -->
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="form-label">Billed to</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <span><label class="font-weight-bold"><?php echo lang('patient').' '.lang('name').' :'; ?>&nbsp</label><?php
                                                            if (!empty($patient)) {
                                                                echo $patient->name;
                                                            }
                                                        ?></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <span><label class="font-weight-bold"><?php echo lang('patient').' '.lang('id').' :'; ?>&nbsp</label><?php
                                                            if (!empty($patient)) {
                                                                echo $patient->patient_id;
                                                            }
                                                        ?></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <span><label class="font-weight-bold"><?php echo lang('age').' :'; ?>&nbsp</label><?php
                                                            if (!empty($patient)) {
                                                                echo $age;
                                                            }
                                                        ?></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <span><label class="font-weight-bold"><?php echo lang('address').' :'; ?>&nbsp</label><?php
                                                            if (!empty($patient)) {
                                                                echo $patient->address;
                                                            }
                                                        ?></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered w-100" id="editable-sample">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Description</th>
                                                                    <th>Rate</th>
                                                                    <th>Qty</th>
                                                                    <th>Line Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>11-03-2022</td>
                                                                    <td>Description1</td>
                                                                    <td>27000</td>
                                                                    <td>1</td>
                                                                    <td>27000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11-03-2022</td>
                                                                    <td>Description2</td>
                                                                    <td>27000</td>
                                                                    <td>1</td>
                                                                    <td>27000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11-03-2022</td>
                                                                    <td>Description3</td>
                                                                    <td>27000</td>
                                                                    <td>1</td>
                                                                    <td>27000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11-03-2022</td>
                                                                    <td>Description4</td>
                                                                    <td>27000</td>
                                                                    <td>1</td>
                                                                    <td>27000</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- end app-content-->
            </div>

            <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            Copyright © 2021 <a href="#">Rygel Dash</a>. Deployed by <a href="#">Rygel Technology Solutions</a> All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->
        </div>

        <!-- Back to top -->
        <a href="#top" id="back-to-top" class="d-print-none">
            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
        </a>

        <!-- Jquery js-->
        <script src="<?php echo base_url('public/assets/js/vendors/jquery-3.5.1.min.js'); ?>"></script>

        <!-- Bootstrap4 js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!--Othercharts js-->
        <script src="<?php echo base_url('public/assets/plugins/othercharts/jquery.sparkline.min.js'); ?>"></script>

        <!-- Circle-progress js-->
        <script src="<?php echo base_url('public/assets/js/vendors/circle-progress.min.js'); ?>"></script>

        <!-- Jquery-rating js-->
        <script src="<?php echo base_url('public/assets/plugins/rating/jquery.rating-stars.js'); ?>"></script>

        <!--Sidemenu js-->
        <script src="<?php echo base_url('public/assets/plugins/sidemenu/sidemenu.js'); ?>"></script>

        <!-- P-scroll js-->
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scroll1.js'); ?>"></script>

        <!-- Custom js-->
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <!--Page specific declarations here. Transferred from head to here-->
        

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script> -->
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

        <script src="<?php echo base_url('public/assets/plugins/signature/signature_plugin.min.js'); ?>"></script>
        <!-- <script src="<?php echo base_url('public/assets/plugins/jspdf/jspdf.plugin.generategrid.js'); ?>"></script> -->

        <script type="text/javascript">
            $(document).ready(function() {
                $("#download").click(function() {
                    var invoice_id = '<?php echo $payment->id; ?>';
                    $.ajax({
                        url: 'finance/getInvoiceDetailsByInvoiceId?id='+invoice_id,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {

                            var item_list = response.item_list;
                            // var imgData = 'data:image/jpeg;base64,'+ btoa('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRjC5MfUm-lXtmuwDmHDoUCK9WKrYXHt-e33-ozzTrbA&s');
                            // console.log(document.getElementsByClassName("profile_image"));
                            // console.log(document.getElementById("profile_image"))

                            // var d = String("");

                            console.log(JSON.stringify(item_list));

                            var img = document.getElementById("company_logo");

                                                var doc = new jsPDF('p', 'mm', [297, 210]),
                                                margins = {
                                                  top: 40,
                                                  bottom: 60,
                                                  left: 40,
                                                  width: 822
                                                };

                                                var splitTitle = doc.splitTextToSize('zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzv', 50);

                                                var table1 = 
                                                    tableToJson($('#editable-sample').get(0)),
                                                    cellWidth = 35,
                                                    dateCellWidth = 25,
                                                    descriptionCellWidth = 49,
                                                    rateCellWidth = 47,
                                                    qtyCellWidth = 32,
                                                    lineTotalCellWidth = 31,
                                                    rowCount = 0,
                                                    cellContent,
                                                    leftMargin = 13,
                                                    topMargin = 98,
                                                    topMarginTable = 55,
                                                    headerRowHeight = 13,
                                                    rowHeight = 13,

                                                    l = {
                                                        orientation: 'p',
                                                        unit: 'mm',
                                                        format: 'a3',
                                                        compress: true,
                                                        fontSize: 8,
                                                        lineHeight: 1,
                                                        autoSize: false,
                                                        printHeaders: true
                                                    };

                                                console.log(tableToJson($('#editable-sample').get(0)));

                                                doc.cellInitialize();

                                                // var doc = new jsPDF({
                                                //   orientation: 'portrait',
                                                //   unit: 'mm',
                                                //   format: [297, 210]
                                                // }),margins = {
                                                //   top: 40,
                                                //   bottom: 60,
                                                //   left: 40,
                                                //   width: 822
                                                // };

                                                // doc.addImage(img, 'jpg', 15, 40, 180, 160);
                                                
                                                // doc.setLineWidth(90);

                                                // doc.setFontSize(12);
                                                // doc.addImage(img, 'jpg', 13, 15, 20, 20);
                                                // doc.text('CEBU MEDICAL DEMO', 25, 17);
                                                // // doc.text('HOSPITAL INVOICE', 90, 17, {align: 'center'});
                                                // doc.text('Cebu Demo Clinic R1', 158, 17, {
                                                //     align: 'justify',
                                                //     maxWidth: 20,
                                                // });


                                                /*Header*/
                                                    doc.setFontSize(12);
                                                    doc.addImage(img, 'jpg', 13, 13, 20, 20);

                                                    /*Hospital Information*/
                                                    doc.text('CEBU MEDICAL DEMO', 35, 17);
                                                    doc.text('HVG IT Park Cebu City, Cebu 6014', 35, 22);
                                                    doc.text('CebuMedicaldemo@gmail.com', 35, 27);
                                                    doc.text('+639166669532', 35, 32);

                                                    /*Invoice Information*/
                                                    doc.text('HOSPITAL INVOICE', 116, 17, {align: 'center'});
                                                    doc.setFontSize(10);
                                                    doc.text('Invoice # 203949', 116, 20, {align: 'center'});

                                                    doc.addImage(img, 'jpg', 176, 13, 18, 18);
                                                    doc.setFontSize(8);
                                                    doc.text(doc.splitTextToSize('Online View', 23), 177, 35);

                                                    /*Bill Info Start*/
                                                        doc.setFontSize(10);
                                                        doc.text('Billed To', 13, 56);
                                                        doc.text('Patient Name : Shin Chan', 13, 61);
                                                        doc.text('Patient ID : 23', 13, 66);
                                                        doc.text('Age : 29', 13, 71);
                                                        doc.text('Address : HVG IT Park Mandaue City Cebu', 13, 76);
                                                        doc.text('Contact : +639332494320', 13, 81);

                                                        doc.text('Facility ID : 9', 89, 61);
                                                        doc.text('Doctor : Dr.Rey Balondoy', 89, 66);
                                                        doc.text('Payer Account : 23-Personal', 89, 71);
                                                        doc.text('Date Issue : 11-04-2022', 89, 76);
                                                        doc.text('Due Date : 12-04-2022', 89, 81);

                                                        doc.setFontSize(10);
                                                        doc.text('Amount Due (PHP)', 158, 73);
                                                        doc.setFontSize(18);
                                                        doc.text(doc.splitTextToSize('33,124.50', 41), 158, 81);

                                                        doc.setFontSize(10);
                                                        doc.text('Amount Due (PHP)', 158, 72);
                                                        doc.setFontSize(18);
                                                        doc.text(doc.splitTextToSize('33,124.50', 41), 158, 80);
                                                    /*Bill Info End*/

                                                /*Header*/

                                                /*Table*/
                                                    // $.each(item_list, function (i, row)
                                                    // {

                                                    //     rowCount++;

                                                    //     $.each(row, function (j, cellContent) {

                                                    //         if (j == "date") {
                                                    //             cellWidth = dateCellWidth;
                                                    //         } else if (j == "description") {
                                                    //             cellWidth = descriptionCellWidth;
                                                    //         } else if (j == "rate") {
                                                    //             cellWidth = rateCellWidth;
                                                    //         } else if (j == "qty") {
                                                    //             cellWidth = qtyCellWidth;
                                                    //         } else if (j == "linetotal") {
                                                    //             cellWidth = lineTotalCellWidth;
                                                    //         }

                                                    //         if (rowCount == 1) {
                                                    //             doc.margins = 1;
                                                    //             doc.setFontSize(8);                    
                                                    //             doc.setFont("courier ");
                                                    //             doc.setFontType("bolditalic ");

                                                    //             doc.cell(leftMargin, topMargin, cellWidth, headerRowHeight, cellContent, i)
                                                    //         }
                                                    //         else if (rowCount == 2) {
                                                    //             doc.margins = 1;
                                                    //             doc.setFontSize(8);                    
                                                    //             doc.setFont("courier ");
                                                    //             doc.setFontType("bolditalic ");                  

                                                    //             doc.cell(leftMargin, topMargin, cellWidth, rowHeight, cellContent, i); 
                                                    //         }
                                                    //         else {

                                                    //             doc.margins = 1;
                                                    //             doc.setFontSize(8);                    
                                                    //             doc.setFont("courier ");
                                                    //             doc.setFontType("bolditalic ");
                                                    //             doc.cell(leftMargin, topMargin, cellWidth, rowHeight, cellContent, i);  // 1st=left margin    2nd parameter=top margin,     3rd=row cell width      4th=Row height
                                                    //         }
                                                    //     })
                                                    // })

                                                /*Table*/

                            // doc.text('Hi How are you', 105, 15, 'center');

                                                // let header = ["date","description","rate","qty","linetotal"];

                                                // let headerConfig = header.map(key=>({ 
                                                //   'name': key,
                                                //   'prompt': key,
                                                //   'width':50,
                                                //   'align':'center',
                                                //   'padding':0
                                                // }));

                                                // doc.table(13, 198, item_list, headerConfig)

                                            /*AutoTable JSPDF Theme*/

                                                console.log(item_list);

                                                var output = item_list.map(function(obj) {
                                                  return Object.keys(obj).sort().map(function(key) { 
                                                    return obj[key];
                                                  });
                                                });

                                                console.log(output);

                                                doc.autoTable({
                                                    theme: 'grid',//striped Default
                                                    headStyles: { 
                                                        // lineWidth: 1, lineColor: [255, 0, 0],
                                                        lineWidth: 0.3,
                                                        lineColor: [226, 226, 226],
                                                        halign: 'center',
                                                        fillColor: [255, 255, 255],
                                                        textColor: '#000000',
                                                    },
                                                    // alternateRowStyles: {
                                                    //     fontStyle: 'bold',
                                                    // },
                                                    columnStyles: {
                                                        0: { valign: 'middle', halign: 'center', cellWidth: 25 },
                                                        1: { valign: 'middle', halign: 'left', cellWidth: 94 },
                                                        2: { valign: 'middle', halign: 'right', cellWidth: 26 },
                                                        3: { valign: 'middle', halign: 'center', cellWidth: 13 },
                                                        4: { valign: 'middle', halign: 'right', cellWidth: 26 }
                                                    },
                                                    margin: { left: 13, right: 13 },
                                                    head: [["Date","Description","Rate","Qty","Line Total"]],
                                                    body: output,
                                                    // body: [
                                                    //     ['David', 'david@example.com', 'Sweden'],
                                                    //     ['Castille', 'castille@example.com', 'Spain'],
                                                    // ],
                                                    startY: 98,
                                                    showHead: 'everyPage',
                                                    showFoot: 'everyPage',
                                                    pageBreak: 'auto',
                                                    didParseCell: function (Data) {
                                                        // if (HookData.cell == undefined) {
                                                        //     return;
                                                        // }

                                                        let startX = Data.cell.x;
                                                        let startY = Data.cell.y;
                                                        console.log(Data);
                                                        
                                                        if (Data.section === 'body' && Data.column.index === 1) {
                                                        }
                                                    }
                                                })

                                                doc.autoTable({
                                                    theme: 'grid',//striped Default
                                                    headStyles: { 
                                                        // lineWidth: 1, lineColor: [255, 0, 0],
                                                        lineWidth: 0.3,
                                                        lineColor: [226, 226, 226],
                                                        halign: 'center',
                                                        fillColor: [255, 255, 255],
                                                        textColor: '#000000',
                                                    },
                                                    // alternateRowStyles: {
                                                    //     fontStyle: 'bold',
                                                    // },
                                                    columnStyles: {
                                                        0: { valign: 'middle', halign: 'center', cellWidth: 25 },
                                                        1: { valign: 'middle', halign: 'left', cellWidth: 94 },
                                                        2: { valign: 'middle', halign: 'right', cellWidth: 26 },
                                                        3: { valign: 'middle', halign: 'center', cellWidth: 13 },
                                                        4: { valign: 'middle', halign: 'right', cellWidth: 26 }
                                                    },
                                                    margin: { left: 13, right: 13 },
                                                    head: [["Date","Description","Rate","Qty","Line Total"]],
                                                    body: [
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                        ['David', 'david@example.com', 'Sweden'],
                                                        ['Castille', 'castille@example.com', 'Spain'],
                                                    ],
                                                    startY: 280,
                                                    showHead: 'everyPage',
                                                    showFoot: 'everyPage',
                                                    pageBreak: 'avoid',
                                                    didParseCell: function (Data) {
                                                        // if (HookData.cell == undefined) {
                                                        //     return;
                                                        // }

                                                        let startX = Data.cell.x;
                                                        let startY = Data.cell.y;
                                                        console.log(Data);
                                                        
                                                        if (Data.section === 'body' && Data.column.index === 1) {
                                                        }
                                                    }
                                                })
            
                                                doc.addPage('a4', 'p');

                                            /*AutoTable JSPDF Theme*/

                                                doc.save('my-pdf.pdf');

                                                function tableToJson(table) {
                                                var data = [];

                                                // first row needs to be headers
                                                var headers = [];
                                                for (var i=0; i<table.rows[0].cells.length; i++) {
                                                    headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
                                                }

                                                // go through cells
                                                for (var i=1; i<table.rows.length; i++) {

                                                    var tableRow = table.rows[i];
                                                    var rowData = {};

                                                    for (var j=0; j<tableRow.cells.length; j++) {

                                                        rowData[ headers[j] ] = tableRow.cells[j].innerHTML;

                                                    }

                                                    data.push(rowData);
                                                }       

                                                return data; }

                            // var pdf = new jsPDF('p','in','letter')
                            // , sizes = [12]
                            // , fonts = [['Times','Roman'],['Helvetica',''], ['Times','Italic']]
                            // , font, size, lines
                            // , verticalOffset = 0.5 // inches on a 8.5 x 11 inch sheet.
                            // , loremipsum = 'Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...'

                            // for (var i in fonts){
                            //     if (fonts.hasOwnProperty(i)) {
                            //         font = fonts[i]
                            //         size = sizes[i]

                            //         lines = pdf.setFont(font[0], font[1])
                            //                     .setFontSize(size)
                            //                     .splitTextToSize(loremipsum, 7.5)
                            //         // Don't want to preset font, size to calculate the lines?
                            //         // .splitTextToSize(text, maxsize, options)
                            //         // allows you to pass an object with any of the following:
                            //         // {
                            //         //  'fontSize': 12
                            //         //  , 'fontStyle': 'Italic'
                            //         //  , 'fontName': 'Times'
                            //         // }
                            //         // Without these, .splitTextToSize will use current / default
                            //         // font Family, Style, Size.

                            //         pdf.text(0.5, verticalOffset + size / 72, lines)

                            //         verticalOffset += (lines.length + 0.5) * size / 72
                            //     }
                            // }

                            // pdf.save('Test.pdf');
                        }
                    })
                });
            });
        </script>

    </body>
</html>         
<!--OLD Starts Here-->
