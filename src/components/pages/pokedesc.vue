<template>
  <!-- Section permettant d'appliquer un background à la page  -->
  <section class="background">
    <div id="app" class="poke-desc-content-container center">
      <div class="poke-desc-container">
        <div class="poke-desc-wrapper">
          <div class="previous-next-wrapper">
            <!--Utilisation du component PreviousButton (@/components/buttons/previousButton.vue) Bouton permettant d'accéder pokémon précédent-->
            <PreviousButton />
            <!--Utilisation du component NextButton (@/components/buttons/nextButton.vue) Bouton permettant d'accéder au prochain pokémon-->
            <NextButton />
          </div>
          <PokeStats/>

          <div class="poke-desc">
            <!-- Utilisation du component PokeImage (@components/elements/image.vue) Réccupération de l'image du pokémon -->
            <PokeImage />
            <div class="poke-infos">
              <div class="poke-id-name center">
                <!-- Utilisation du component PokeId (@components/elements/id.vue) Réccupération de l'id du pokémon -->
                <PokeId />
                <!-- Utilisation du component PokeName (@components/elements/name.vue) Réccupération du nom du pokémon -->
                <PokeName />
              </div>
              <!-- Utilisation du component PokeCategory (@components/elements/category.vue) Réccupération de la catégorie du pokémon -->
              <PokeCategory />
              <!-- Utilisation du component PokeDescription (@components/elements/description.vue) Réccupération de la description du pokémon -->
              <PokeDescription />

              <PokeType />

              <div class="poke-weak-strength-wrapper">
                <!-- Utilisation du component PokeWeakness (@components/types/weaknessType.vue) Réccupération des faiblesses du pokémon -->
                <PokeWeakness />
                <!-- Utilisation du component PokeStrength (@components/types/strengthType.vue) Réccupération des forces du pokémon -->
                <PokeStrength />
              </div>
            </div>
          </div>

          <div class="pokevolution">
            <!-- Utilisation du component FirstEvolution (@components/evolution/firstEvolution.vue) Réccupération de la 1ère évolution du pokémon -->
            <FirstEvolution />

            <!-- <div class="arrow" v-if="typeof(secondEvolutionName.name)!='undefined'">
              <img src="../../assets/icons/icons8-chevron-droit-50.png" alt />
            </div>-->

            <!-- Utilisation du component SecondEvolution (@components/evolution/secondEvolution.vue) Réccupération de la 2ème évolution du pokémon -->
            <SecondEvolution />

            <!-- <div class="arrow" v-if="typeof(lastEvolutionName.name)!='undefined'">
              <img src="../../assets/icons/icons8-chevron-droit-50.png" alt />
            </div>-->

            <!-- Utilisation du component LastEvolution (@components/evolution/lastEvolution.vue) Réccupération de la 3ème évolution du pokémon -->
            <LastEvolution />
          </div>
          
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  //Import des components à utiliser
  import NextButton from "@/components/buttons/nextButton";
  import PreviousButton from "@/components/buttons/previousButton";
  import FirstEvolution from "@/components/evolution/firstEvolution";
  import SecondEvolution from "@/components/evolution/secondEvolution";
  import LastEvolution from "@/components/evolution/lastEvolution";
  import PokeType from "@/components/types/pokeType";
  import PokeWeakness from "@/components/types/weaknessType";
  import PokeStrength from "@/components/types/strengthType";
  import PokeName from "@/components/elements/name";
  import PokeDescription from "@/components/elements/description";
  import PokeCategory from "@/components/elements/category";
  import PokeId from "@/components/elements/id";
  import PokeImage from "@/components/elements/image";
  import PokeStats from "@/components/stats/pokeStats";
  export default {
    //Réccupération des components
    components: {
      PreviousButton,
      NextButton,
      FirstEvolution,
      SecondEvolution,
      LastEvolution,
      PokeName,
      PokeDescription,
      PokeCategory,
      PokeId,
      PokeImage,
      PokeWeakness,
      PokeStrength,
      PokeType,
      PokeStats,
    }
    // data() {
    //   return {
    //     id: ""
    //   };
    // },

    // mounted: function() {
    //   this.id = window.location.href;
    //   this.id = this.id.split("/");
    //   this.id = this.id[this.id.length - 1];
    //   this.id = Number(this.id);
    // }
  };
</script>

<style>
  .poke-desc-container {
    padding: 5.5rem 1.5rem 1.5rem 0;
    max-width: 70%;
  }

  .poke-desc-wrapper {
    background: #f6f6f6;
    border-radius: 20px;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
    padding: 5px 30px;
  }

  .poke-desc {
    display: grid;
    grid-template-columns: 4fr 6fr;
    grid-column-gap: 1.5rem;
  }

  .poke-id-name {
    padding-bottom: 1%;
  }

  .poke-categorie {
    padding-bottom: 5%;
    color: #3b3b3b;
  }

  .poke-weak-strength-wrapper {
    display: grid;
    grid-template-columns: 5fr 5fr;
    grid-column-gap: 1.5rem;
  }

  .weaknesses,
  .strengths {
    display: grid;
    grid-template-columns: 5fr 5fr;
    grid-gap: 0.5rem;
  }

  .type {
    padding: 8px;
    border-radius: 10px;
    font-size: 15px;
    width: 110px;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  }

  .normal {
    background: #a7a99d;
    border: 2px solid #8f9281;
  }

  .grass {
    background: #79b05f;
    border: 2px solid #609348;
  }

  .poison {
    background: #a46a94;
    border: 2px solid #885379;
  }

  .psychic {
    background: #e473a1;
    border: 2px solid #dc4782;
  }

  .ground {
    background: #cfb063;
    border: 2px solid #c39d3c;
  }

  .ice {
    background: #7dc9e9;
    border: 2px solid #51b6e1;
  }

  .fire {
    background: #e7624f;
    border: 2px solid #e13c23;
  }

  .rock {
    background: #b5a66f;
    border: 2px solid #9e8e51;
  }

  .dragon {
    background: #827bdc;
    border: 2px solid #5a52d1;
  }

  .water {
    background: #4c9be8;
    border: 2px solid #1d7fe2;
  }

  .bug {
    background: #acb14a;
    border: 2px solid #888c3b;
  }

  .fighting {
    background: #aa664e;
    border: 2px solid #88523f;
  }

  .shadow {
    background: #7578bb;
    border: 2px solid #5458ab;
  }

  .flying {
    background: #6f95e3;
    border: 2px solid #4476da;
  }

  .electric {
    background: #e9c15e;
    border: 2px solid #e3b031;
  }

  .steel {
    background: #abadba;
    border: 2px solid #8f92a3;
  }

  .dark {
    background: #8a6b57;
    border: 2px solid #6b5343;
  }

  .fairy {
    background: #daa6d7;
    border: 2px solid #ca81c7;
  }

  .ghost {
    background: #817a8a;
    border: 2px solid #68626f;
  }

  .pokevolution {
    display: flex;
    justify-content: space-around;
    margin: 30px 0;
    padding: 50px 0;
    background: #e7e7e7;
    border-radius: 20px;
  }

  .first-evolution,
  .second-evolution,
  .last-evolution {
    background: #f6f6f6;
    border-radius: 20px;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
    padding: 20px;
  }

  .arrow {
    display: flex;
    align-items: center;
  }

  .previous-next-wrapper {
    display: grid;
    grid-template-columns: 50% 50%;
    margin: 20px 0;
  }
</style>