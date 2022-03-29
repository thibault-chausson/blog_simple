function afficherPassword(nom)
{
    var input = document.getElementById(nom);
    if (input.type === "password")
    {
        input.type = "text";
    }
    else
    {
        input.type = "password";
    }
}