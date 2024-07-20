# ERN24_TOYSRUS




If you don't have Docker and lando :


https://docs.docker.com/engine/install/ : Doc. Docker

https://docs.lando.dev/install/linux.html : Doc. Lando

<h2>Recipes Lando/PHP</h2>

1- To begin, clone the project on your computer

With the commands :

En SSH :

    git@github.com:FranckGalinier/ERN24_TOYSRUS.git


2- Open the project on a IDE

3- Stop and remove your old container

4- Open a terminal and start the commands (when you are in the folder "ERN24_TOYSRUS")  :

    sh ./RUN/automate.sh

<i># this commands will start the containers lando, install the dependencies and import the database.  </i>

<hr>

Now we can connect you on the Database with the configuration in lando.yml to see more tables


    database:
    portforward: 3307 
    creds:
      user: admin
      password: admin
      database: toysrus

<h2>Technologies utilisés</h2>
<div class="d-flex flex-column">
<img src="https://camo.githubusercontent.com/1d94c7bb2a157cac53286f9ed3ff8fe14d0bbca10da596d246b3a7db79faa50e/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f5048502d382e782d3738374342353f6c6f676f3d706870"></br>

<img src="https://camo.githubusercontent.com/9a9e7e3fb67942982b24a638d2582228775f791dcaf964d10aaef0776e2be909/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f4d7953514c2d352e372d3434373941313f6c6f676f3d6d7973716c">
</div>
