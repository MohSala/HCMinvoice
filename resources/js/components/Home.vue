<template>
    <div class="row">
        <div class="col-lg-12">

             <!-- STATISTIC CHART-->
    <section class="statistic-chart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">statistics</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <!-- CHART-->
                    <div class="statistic-chart-1">
                        <h3 class="title-3 m-b-30">chart</h3>
                        <div class="chart-wrap">
                            <canvas id="widgetChart5"></canvas>
                        </div>
                        <div class="statistic-chart-1-note">
                            <span class="big">10,368</span>
                            <span>/ 16220 Invoices Created</span>
                        </div>
                    </div>
                    <!-- END CHART-->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!-- TOP CAMPAIGN-->
                    <div class="top-campaign">
                        <h3 class="title-3 m-b-30">top 5 customers</h3>
                        <div class="table-responsive">
                            <table class="table table-top-campaign">
                                <thead>
                                    <th>Company name</th>
                                    <th>Managed By.</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1. D.P.R</td>
                                        <td>$70,261.65</td>
                                    </tr>
                                    <tr>
                                        <td>2. Prime Atlantic</td>
                                        <td>$46,399.22</td>
                                    </tr>
                                    <tr>
                                        <td>3. A.C.A</td>
                                        <td>$35,364.90</td>
                                    </tr>
                                    <tr>
                                        <td>4. Valourec</td>
                                        <td>$20,366.96</td>
                                    </tr>
                                    <tr>
                                        <td>5. UBA</td>
                                        <td>$10,366.96</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TOP CAMPAIGN-->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!-- CHART PERCENT-->
                    <div class="chart-percent-2">
                        <h3 class="title-3 m-b-30">chart by %</h3>
                        <div class="chart-wrap">
                            <canvas id="percent-chart2"></canvas>
                            <div id="chartjs-tooltip">
                                <table></table>
                            </div>
                        </div>
                        <div class="chart-info">
                            <div class="chart-note">
                                <span class="dot dot--blue"></span>
                                <span>reviewed</span>
                            </div>
                            <div class="chart-note">
                                <span class="dot dot--red"></span>
                                <span>unreviewed</span>
                            </div>
                        </div>
                    </div>
                    <!-- END CHART PERCENT-->
                </div>
            </div>
        </div>
    </section>
    <!-- END STATISTIC CHART-->


               <!-- STATISTIC-->
    <section class="statistic statistic2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--green">
                        <h2 class="number">10,368</h2>
                        <span class="desc">members online</span>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--orange">
                        <h2 class="number">388,688</h2>
                        <span class="desc">items sold</span>
                        <div class="icon">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--blue">
                        <h2 class="number">1,086</h2>
                        <span class="desc">this week</span>
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item statistic__item--red">
                        <h2 class="number">$1,060,386</h2>
                        <span class="desc">total earnings</span>
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

            <h2 class="title-1 m-b-25">Approved Invoices</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>date</th>
                            <th>order ID</th>
                            <th>name</th>
                            <th class="text-right">price</th>
                            <th class="text-right">quantity</th>
                            <th class="text-right">total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2018-09-29 05:57</td>
                            <td>100398</td>
                            <td>iPhone X 64Gb Grey</td>
                            <td class="text-right">$999.00</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$999.00</td>
                        </tr>
                        <tr>
                            <td>2018-09-28 01:22</td>
                            <td>100397</td>
                            <td>Samsung S8 Black</td>
                            <td class="text-right">$756.00</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$756.00</td>
                        </tr>
                        <tr>
                            <td>2018-09-27 02:12</td>
                            <td>100396</td>
                            <td>Game Console Controller</td>
                            <td class="text-right">$22.00</td>
                            <td class="text-right">2</td>
                            <td class="text-right">$44.00</td>
                        </tr>
                        <tr>
                            <td>2018-09-26 23:06</td>
                            <td>100395</td>
                            <td>iPhone X 256Gb Black</td>
                            <td class="text-right">$1199.00</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$1199.00</td>
                        </tr>
                        <tr>
                            <td>2018-09-25 19:03</td>
                            <td>100393</td>
                            <td>USB 3.0 Cable</td>
                            <td class="text-right">$10.00</td>
                            <td class="text-right">3</td>
                            <td class="text-right">$30.00</td>
                        </tr>
                        <tr>
                            <td>2018-09-29 05:57</td>
                            <td>100392</td>
                            <td>Smartwatch 4.0 LTE Wifi</td>
                            <td class="text-right">$199.00</td>
                            <td class="text-right">6</td>
                            <td class="text-right">$1494.00</td>
                        </tr>
                        <tr>
                            <td>2018-09-24 19:10</td>
                            <td>100391</td>
                            <td>Camera C430W 4k</td>
                            <td class="text-right">$699.00</td>
                            <td class="text-right">1</td>
                            <td class="text-right">$699.00</td>
                        </tr>
                        <tr>
                            <td>2018-09-22 00:43</td>
                            <td>100393</td>
                            <td>USB 3.0 Cable</td>
                            <td class="text-right">$10.00</td>
                            <td class="text-right">3</td>
                            <td class="text-right">$30.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('mounted');
    }
}
</script>

