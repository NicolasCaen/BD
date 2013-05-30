SELECT bd_titre, bd_resume,bd_id, bd_auteur_id,bd_image, auteurs.aut_nom as auteur ,th.th_intitule
FROM bandesdessinees bd
INNER JOIN auteurs ON bd.bd_auteur_id=auteurs.aut_id 
INNER JOIN liens_bd_themes l  ON    bd.bd_id= l.lien_bd_id
INNER JOIN themes th  ON    th.th_id= l.lien_themes_id 
WHERE  th.th_intitule='adulte'

SELECT bd.bd_titre,bd.bd_image,com_bd_id,com_date,com_auteur,com_texte, visibility FROM commentaires c
INNER JOIN bandesdessinees bd ON c.com_bd_id=bd.bd_id
