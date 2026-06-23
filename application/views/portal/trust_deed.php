<?php $this->load->view('layout/header'); ?>

<style>
  .file-item{
    background: #f8f9ff;
    border: 1px solid #e6e9ff;
    transition: all 0.2s ease;
}

.file-item:hover{
    background: #eaf0ff;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.08);
}

.file-name{
    color: #1f3bb3;
    font-size: 15px;
}

.file-item:hover .file-name{
    color: #0d6efd;
}

.heroo-sea-bg {
    position: relative;

    background-image: linear-gradient(
        to bottom,
        rgba(17, 34, 51, 0.75),
        rgba(17, 34, 51, 0.5)
    ),
    url('https://cliftonparktrustees.org/wp-content/uploads/2012/04/HeaderImage.jpg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    min-height: 30vh;   /* better than fixed height */
    display: flex;
    align-items: center;
    justify-content: center;

    color: #fff;
    text-align: center;
}

.document-content{
    font-size:16px;
    line-height:1.9;
    color:#333;
}

.document-content p{
    margin-bottom:1.2rem;
}

.section-title{
    color:#0d3b66;
    font-weight:700;
    margin-bottom:1rem;
}

.card{
    border-radius:16px;
}

.card-header{
    border-radius:16px 16px 0 0 !important;
}

@media print{
    .btn{
        display:none;
    }

    .card{
        box-shadow:none !important;
        border:none !important;
    }
}
</style>
  <!-- 2. HERO SECTION WITH BG OF SEA -->
    <header class="heroo-sea-bg text-white">
        <div class="container text-center text-lg-start">
            <div class="row">
                <div class="col-lg-12">
           
                    <h1 class=" display-4 fw-bold mb-3 text-center">Trust Deed</h1>

                  
                </div>
            </div>
        </div>
    </header>

<main class="container my-5">

    <div class="row justify-content-center">

        <div class="col-lg-12">


            <!-- Document Card -->
            <div class="card shadow-sm border-0">

                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-2">TRUST DEED DATED MARCH 25, 1912</h2>
                    <p class="mb-0">
                        Recorded March 27, 1912 in Cuyahoga County Records, Cleveland, Ohio
                    </p>
                    <small>Volume 1382, Pages 277-280</small>
                </div>

                <div class="card-body p-4 p-lg-5 document-content">

        
                    <p>
                      <span style="font-weight:bold;">Know all Men by these Presents,</span>  That The Clifton Park Land & Improvement Company, the grantor, for divers good causes and considerations thereunto moving, and especially in consideration of the covenants and agreements entered into by said Company with the several owners of lots and lands in its allotment herein described, and further for the sum of One Dollar ($1.00) received to its full satisfaction of F. C. Case, Lucien B. Hall, F. A. Glidden, E. E. Adams and F. B. Anderson, Trustees, has given, granted, remised, released and forever quit-claimed and does by these presents absolutely give, grant, remise, release and forever quit-claim unto said grantees, and their successors in trust or assigns, and the survivors or survivor of them, and the heirs of such survivor, forever, all such right and title as the said grantor has or ought to have in the following described pieces and parcels of land, situated in the City of Lakewood, County of Cuyahoga, and State of Ohio, and being the parts and parcels of land in the grantor’s said allotment or lying adjacent thereto which have been reserved for the use and benefit of the owners of land in said allotment, and described as follows, viz.:
                    </p>

                    <hr>

                  

                    <p>
                      <span style="font-weight:bold;">  1.</span> The three triangular parcels designated as “Reserved M,” “Reserved N,” and “Reserved O,” on the map of the allotment of Clifton Park as the same is recorded in the Map Records of Cuyahoga County, Volume 29, Page 11, reserving, however, to the grantor the right at any time within one year from this date to remove from said parcel marked “Reserved O” the earth and other material piled thereon to a level not lower than the street curb line bounding said parcel; also the shelter house standing in Clifton Road at the entrance to the Park.
                    </p>

                    <p>
                         <span style="font-weight:bold;">  2.</span> All that part of Blocks A and B in said Clifton Park allotment above referred to, lying westerly from the 10-foot strip of land through said Block B, which was designated as a right of way connected with the overhead crossing over the tracks of the N.Y.C. & St. L. Railroad, and dedicated by said The Clifton Park Land & Improvement Company in a map and dedication of Sloan Subway and other lands, as shown by the plat of said dedication upon the Map Records of Cuyahoga County, Volume 30, page 7, excepting from said Block A all that portion heretofore conveyed by The Clifton Park Land & Improvement Company to The American American Construction Company by a deed recorded in Cuyahoga County Records, Volume</span>
                    </p>
                        <p>1158, Page 598, subject to the right of way for Sloan Subway, as designated on said subway map, in volume 30 of Maps, Page 7, above referred to.

</p>
                    <hr>

                    <h4 class="section-title">
                        Duties of Trustees
                    </h4>

                    <ol>
                        <li>
                            Hold title to and preserve all common lands.
                        </li>
                        <li>
                            No common land shall be sold without unanimous consent
                            of all lot owners.
                        </li>
                        <li>
                            Maintain roads, grounds, buildings, stairways and common areas.
                        </li>
                        <li>
                            Collect assessments necessary for maintenance.
                        </li>
                        <li>
                            Serve without compensation except reimbursement of expenses.
                        </li>
                    </ol>

                    <hr>

                    <h4 class="section-title">
                        Making and Collection of Assessments
                    </h4>

                    <p>
                        The cost of all ordinary care of the lands and buildings in the
                        hands of the trustees shall be divided among the several lot
                        owners and collected from them by annual assessment.
                    </p>

                    <hr>

                    <div class="text-end mt-5">
                        <strong>
                            THE CLIFTON PARK LAND & IMPROVEMENT CO.
                        </strong>
                        <br>
                        L. A. REED, Vice President
                        <br>
                        J. J. CROOKS, Secretary
                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

   <?php $this->load->view('layout/footer'); ?>