<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="col-10 mx-auto shadow p-d">
            <h1 class="text-primary text-center "> Sign Up Page</h1>
            <div class="row">
                <!-- <div class="col-6 mx-auto p-3 mb-5 bg-body rounded">
                    <p class="p-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta velit cupiditate natus vel placeat. Ipsa nesciunt officiis amet deleniti voluptatum. Reiciendis delectus, assumenda animi consectetur ducimus, necessitatibus placeat est architecto numquam ipsam nam, commodi consequatur. Ullam autem, quidem deleniti delectus facilis voluptas doloribus suscipit perferendis reiciendis ipsam iusto quasi amet dolore recusandae dolorem minima, exercitationem asperiores impedit? Culpa vel nostrum quasi reiciendis, praesentium itaque incidunt sequi, laudantium dignissimos repudiandae quidem error quaerat eum odio dolores rerum temporibus nihil deleniti ipsum, possimus adipisci reprehenderit! Atque voluptas reiciendis dolorem nobis unde odit ab, temporibus totam, repellat voluptatem cum officia obcaecati earum architecto deleniti autem! Nisi deserunt dignissimos repudiandae quas, quisquam quod doloribus. Rerum sint et minus placeat libero, sapiente cumque quidem similique assumenda laudantium dolores voluptas eius reprehenderit. Eius, accusamus maxime harum, a illum aspernatur sunt, pariatur animi laboriosam ab eaque obcaecati? Illum, magni. Nemo, ipsa consequatur. Mollitia maiores nobis iusto quod facilis dolore. Nesciunt molestias id voluptas, quia dignissimos nulla cum pariatur at, aperiam voluptates sed architecto, eveniet ipsa odio modi. Harum ipsa iure eos sapiente doloribus animi temporibus nulla nisi. Porro ullam aperiam beatae qui sit aliquam quod alias. Dicta saepe officiis libero iure maiores distinctio ducimus dolorem sapiente dolor?</p>
                </div> -->
                <div class="col-6 mx-auto p-3 mb-5 bg-body ">
                    <form action="signupprocess.php" method="post">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">fullname</label>
                            <input type="text" class="form-control" id="fullname" name="fullname">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>    
            
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber">
                        </div>
                        <div class="mb-3">
                            <!-- <label for="position" class="form-label">position</label>
                            <input type="checkbox" class="form-control" name="position"> -->
                            <label>
      <input type="radio" name="position" value="student">
      Student
    </label>
    
    <label>
      <input type="radio" name="position" value="admin">
      admin
    </label>
                        </div>
                        <input type="submit" class="btn btn-outline-primary" value="Sign Up" name="submit">
                        <!-- <button type="submit" class="btn btn-outline-primary">Sign Up</button> -->

                    </form>
    <?php
    session_start();
    if (isset($_SESSION['msg'])) {
        echo"<div class ='alert alert-danger'>" .$_SESSION['msg']."</div>";
        unset($_SESSION['msg']);
    }
    ?>
                </div>

            </div>
        </div>
    </div>
</body>
</html>