<template>
  <section class="background">
    <div id="app" class="poke-desc-content-container center">
      <div class="poke-desc-container">
        <div class="poke-desc-wrapper">

          <div class="previous-next-wrapper">
            <PreviousButton/>
            <NextButton/>
          </div>

          <div class="poke-desc">
            <PokeImage/>
            <div class="poke-infos">

              <div class="poke-id-name center">
                <PokeId/>
                <PokeName/>
              </div>

              <PokeCategory/>

              <PokeDescription/>
              
              <div class="poke-type center capitalize">
                <!-- <div class="poke-type-container">
                  <div class="poke-type-title text-center">
                    <h2>Type</h2>
                  </div>
                  <div class="types text-center">
                    <div v-for="(todo, value) in typefilter" :key=" value + '-todo1'">
                      <div v-if=" infoPokemon.type1 == typefilter[value]" class="type click first-type"
                        v-bind:class="typefilter[value]">{{ infoPokemon.type1 }}</div>
                    </div>
                    <div v-for="(todo, value) in typefilter" :key=" value + '-todo2'">
                      <div v-if=" infoPokemon.type2 == typefilter[value]" class="type click second-type"
                        v-bind:class="typefilter[value]">{{ infoPokemon.type2 }}</div>
                    </div>
                  </div>
                </div> -->
                <PokeType/>
              </div>

              <div class="poke-weak-strength-wrapper">
                <div class="poke-weakness center capitalize">
                  <PokeWeakness/>
                  <!-- <div class="poke-weakness-container">
                    <div class="poke-weakness-title text-center">
                      <h2>Faiblesses</h2>
                    </div>
                    <div class="weaknesses text-center">
                      <div v-for="todo in weaknesstable" :key="todo" class="type" v-bind:class="todo">{{ todo }}
                      </div>
                    </div>
                  </div> -->
                </div>
                <div class="poke-strength center capitalize">
                  <PokeStrength/>
                  <!-- <div class="poke-strength-container">
                    <div class="poke-strength-title text-center">
                      <h2>Forces</h2>
                    </div>
                    <div class="strengths text-center">
                      <div v-for="i in strengthtable" :key="i" class="type" v-bind:class="i">{{ i }}
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>

          <div class="pokevolution">
            <FirstEvolution/>

            <!-- <div class="arrow" v-if="typeof(secondEvolutionName.name)!='undefined'">
              <img src="../../assets/icons/icons8-chevron-droit-50.png" alt />
            </div> -->

            <SecondEvolution/>

            <!-- <div class="arrow" v-if="typeof(lastEvolutionName.name)!='undefined'">
              <img src="../../assets/icons/icons8-chevron-droit-50.png" alt />
            </div> -->

            <LastEvolution/>
          </div>

        </div>
      </div>
    </div>
  </section>
</template>

<script>
  // import axios from "axios";
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
  export default {
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
    },
    data() {
      return {
        // moreType: "",
        // moreType1: "",
        id: "",
        // infoPokemon: [],
        // infoPokemonSpecies: [],
        // infoType: [],
        // infoType2: [],
        // weaknesstable: [],
        // strengthtable: [],
        // typefilter: [
        //   "fire",
        //   "poison",
        //   "normal",
        //   "fighting",
        //   "flying",
        //   "ground",
        //   "rock",
        //   "bug",
        //   "steel",
        //   "water",
        //   "grass",
        //   "electric",
        //   "psychic",
        //   "ice",
        //   "dragon",
        //   "dark",
        //   "fairy",
        //   "shadow",
        //   "ghost"
        // ],
      };
    },

    mounted: function () {
      this.id = window.location.href;
      this.id = this.id.split("/");
      this.id = this.id[this.id.length - 1];
      this.id = Number(this.id);

      // axios.get(`https://pokeapi.co/api/v2/pokemon/${this.id}`).then(result => {
      //   if (result.status != 200) {
      //     window.location.replace("error.php");
      //   }
      //   if (result.data.types[1]) {
          // this.infoPokemon = {
          //   // image: result.data.sprites.front_default,
          //   type1: result.data.types[0].type.name,
          //   type2: result.data.types[1].type.name,
          // };
          // this.moreType = result.data.types[0].type.url;
          // this.moreType1 = result.data.types[1].type.url;
          // axios.get(this.moreType).then(result => {
          //   if (result.status != 200) {
          //     window.location.replace("error.php");
          //   }
          //   for (
          //     let index = 0;
          //     index < result.data.damage_relations.double_damage_from.length;
          //     index++
          //   ) {
          //     this.weaknesstable.push(
          //       result.data.damage_relations.double_damage_from[index].name
          //     );
          //   }
          //   for (
          //     let index = 0;
          //     index < result.data.damage_relations.double_damage_to.length;
          //     index++
          //   ) {
          //     this.strengthtable.push(
          //       result.data.damage_relations.double_damage_to[index].name
          //     );
          //   }
          // });
          // axios.get(this.moreType1).then(result => {
          //   if (result.status != 200) {
          //     window.location.replace("error.php");
          //   }
          //   for (
          //     let index = 0;
          //     index < result.data.damage_relations.double_damage_from.length;
          //     index++
          //   ) {
          //     this.weaknesstable.push(
          //       result.data.damage_relations.double_damage_from[index].name
          //     );
          //   }
          //   for (
          //     let index = 0;
          //     index < result.data.damage_relations.double_damage_to.length;
          //     index++
          //   ) {
          //     this.strengthtable.push(
          //       result.data.damage_relations.double_damage_to[index].name
          //     );
          //   }
          // });
        // } else {
          // this.infoPokemon = {
          //   id: result.data.id,
          //   // image: result.data.sprites.front_default,
          //   type1: result.data.types[0].type.name,
          // };
          // this.moreType = result.data.types[0].type.url;
          // axios.get(this.moreType).then(result => {
          //   if (result.status != 200) {
          //     window.location.replace("error.php");
          //   }
          //   for (
          //     let index = 0;
          //     index < result.data.damage_relations.double_damage_from.length;
          //     index++
          //   ) {
          //     this.weaknesstable.push(
          //       result.data.damage_relations.double_damage_from[index].name
          //     );
          //   }
          //   for (
          //     let index = 0;
          //     index < result.data.damage_relations.double_damage_to.length;
          //     index++
          //   ) {
          //     this.strengthtable.push(
          //       result.data.damage_relations.double_damage_to[index].name
          //     );
          //   }
          // });
        }
      // });
      
    // },
  };
</script>
<style>
  .poke-desc-container {
    padding: 5.5rem 1.5rem 0 0;
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

  .poke-type-container {
    padding-bottom: 10px;
  }

  .first-type {
    margin-right: 0.5rem;
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

  .types {
    display: flex;
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