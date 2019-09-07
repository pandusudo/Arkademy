function return_biodata(){
  let biodata = {
    "name" : "Pandu Cahyo Pangestu",
    "age" : 18,
    "address" : "Ketitang, Nogosari, Boyolali Rt 01 Rw 08",
    "hobbies" : ['Programming','Drawing'];
    "is_married" : false;
    "list_school" : [
      {
        "name" : "SMP N 1 Kartasura",
        "year_in" : "2013",
        "year_out" : "2016",
        "major" : null
      },
      {
        "name" : "SMK N 2 Surakarta",
        "year_in" : "2016",
        "year_out" : "2019",
        "major" : "Rekayasa Perangkat Lunak"
      }
    ],
    "skills" : [
      {
        "skill_name" : "Web Development",
        "level" : "Beginner"
      },
      {
        "skill_name" : "UI Design",
        "level" : "Advanced"
      }
    ],
    "interest_in_coding" : true
  }
  return biodata;
}


console.log(return_biodata());
