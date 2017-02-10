function validlogin(champ)
{
  if(champ.value.length < 8){

    document.getElementById('bon_login').style.color = 'red';
    document.getElementById('bon_login').innerText = "Votre pseudo est trop court. Il est de : "+ champ.value.length+" caractères.";
  }
  else{
	document.getElementById('bon_login').style.color = 'green';
    document.getElementById('bon_login').innerText = "Bonne longueur du pseudo. Il est de : "+ champ.value.length+" caractères.";

  }
}

function validmdp(champ1,champ2)
{
  if(champ1.value!=champ2.value || champ1.value.length < 8 || champ2.value.length < 8)
  {
    document.getElementById('verification_mdp').style.color = 'red';
    document.getElementById('verification_mdp').innerText = "Veuillez renseigner deux mot de " +
    		"passes identiques ou vérifier la taille du mot de passe qui est de 8 caracteres minimum";
    document.getElementById('verification_mdp').innertText = champ1.value.length +" caractères.";
  }

  else{
    document.getElementById('verification_mdp').style.color = 'green';
    document.getElementById('verification_mdp').innerText = "Les deux mots de passes sont identiques et de bonne tailes.";
  }
}
