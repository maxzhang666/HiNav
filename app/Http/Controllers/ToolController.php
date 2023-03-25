<?php

namespace App\Http\Controllers;

use App\Extensions\Constants;

class ToolController extends Controller
{
    public function index()
    {
        return 'hi';
    }

    #region canvas
    public function canvas()
    {


        $html = [
            1 => <<<HTML
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="robots" content="noindex">
	<title>io-fx01 - hinav</title>
	<style>
		canvas { position: absolute; top: 0; left: 0; }
	</style>
</head>
<body>
<canvas id="c" width="1920" height="1040"></canvas>
<script>
	var w = c.width = window.innerWidth,
	h = c.height = window.innerHeight,
	ctx = c.getContext('2d'),
	opts = {
		len: 20,
		count: 50,
		baseTime: 10,
		addedTime: 10,
		dieChance: .05,
		spawnChance: 1,
		sparkChance: .1,
		sparkDist: 10,
		sparkSize: 2,
		color: 'hsl(hue,100%,light%)',
		baseLight: 50,
		addedLight: 10,
		shadowToTimePropMult: 6,
		baseLightInputMultiplier: .01,
		addedLightInputMultiplier: .02,
		cx: w / 2,
		cy: h / 2,
		repaintAlpha: .04,
		hueChange: .1
	},
	tick = 0,
	lines = [],
	dieX = w / 2 / opts.len,
	dieY = h / 2 / opts.len,
	baseRad = Math.PI * 2 / 6;
	ctx.fillStyle = 'black';
	ctx.fillRect(0, 0, w, h);
	function loop() {
		window.requestAnimationFrame(loop); ++tick;
		ctx.globalCompositeOperation = 'source-over';
		ctx.shadowBlur = 0;
		ctx.fillStyle = 'rgba(20,20,20,alp)'.replace('alp', opts.repaintAlpha);
		ctx.fillRect(0, 0, w, h);
		ctx.globalCompositeOperation = 'lighter';
		if (lines.length < opts.count && Math.random() < opts.spawnChance) lines.push(new Line);
		lines.map(function(line) {
			line.step()
		})
	}
	function Line() {
		this.reset()
	}
	Line.prototype.reset = function() {
		this.x = 0;
		this.y = 0;
		this.addedX = 0;
		this.addedY = 0;
		this.rad = 0;
		this.lightInputMultiplier = opts.baseLightInputMultiplier + opts.addedLightInputMultiplier * Math.random();
		this.color = opts.color.replace('hue', tick * opts.hueChange);
		this.cumulativeTime = 0;
		this.beginPhase()
	}
	Line.prototype.beginPhase = function() {
		this.x += this.addedX;
		this.y += this.addedY;
		this.time = 0;
		this.targetTime = (opts.baseTime + opts.addedTime * Math.random()) | 0;
		this.rad += baseRad * (Math.random() < .5 ? 1 : -1);
		this.addedX = Math.cos(this.rad);
		this.addedY = Math.sin(this.rad);
		if (Math.random() < opts.dieChance || this.x > dieX || this.x < -dieX || this.y > dieY || this.y < -dieY) this.reset()
	}
	Line.prototype.step = function() {++this.time; ++this.cumulativeTime;
		if (this.time >= this.targetTime) this.beginPhase();
		var prop = this.time / this.targetTime,
		wave = Math.sin(prop * Math.PI / 2),
		x = this.addedX * wave,
		y = this.addedY * wave;
		ctx.shadowBlur = prop * opts.shadowToTimePropMult;
		ctx.fillStyle = ctx.shadowColor = this.color.replace('light', opts.baseLight + opts.addedLight * Math.sin(this.cumulativeTime * this.lightInputMultiplier));
		ctx.fillRect(opts.cx + (this.x + x) * opts.len, opts.cy + (this.y + y) * opts.len, 2, 2);
		if (Math.random() < opts.sparkChance) ctx.fillRect(opts.cx + (this.x + x) * opts.len + Math.random() * opts.sparkDist * (Math.random() < .5 ? 1 : -1) - opts.sparkSize / 2, opts.cy + (this.y + y) * opts.len + Math.random() * opts.sparkDist * (Math.random() < .5 ? 1 : -1) - opts.sparkSize / 2, opts.sparkSize, opts.sparkSize)
	}
	loop();
	window.addEventListener('resize',
	function() {
		w = c.width = window.innerWidth;
		h = c.height = window.innerHeight;
		ctx.fillStyle = 'black';
		ctx.fillRect(0, 0, w, h);
		opts.cx = w / 2;
		opts.cy = h / 2;
		dieX = w / 2 / opts.len;
		dieY = h / 2 / opts.len
	});
</script>

</body>
</html>
HTML,
            2 => <<<HTML
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>io-fx02 - hinav</title>
	<style>
		body {background: #1B1D1F;overflow: hidden;}
		canvas {display: block;}
	</style>
</head>
<body>
	<canvas id="canvas" width="1920" height="1080"></canvas>
	<script>
		var canvas,ctx,width,height,size,lines,tick;
		function line() {
			this.path = [];
			this.speed = rand(10, 20);
			this.count = randInt(10, 30);
			this.x = width / 2, +1;
			this.y = height / 2 + 1;
			this.target = {
				x: width / 2,
				y: height / 2
			};
			this.dist = 0;
			this.angle = 0;
			this.hue = tick / 5;
			this.life = 1;
			this.updateAngle();
			this.updateDist();
		}
		line.prototype.step = function(i) {
			this.x += Math.cos(this.angle) * this.speed;
			this.y += Math.sin(this.angle) * this.speed;

			this.updateDist();

			if (this.dist < this.speed) {
				this.x = this.target.x;
				this.y = this.target.y;
				this.changeTarget();
			}
			this.path.push({
				x: this.x,
				y: this.y
			});
			if (this.path.length > this.count) {
				this.path.shift();
			}

			this.life -= 0.001;

			if (this.life <= 0) {
				this.path = null;
				lines.splice(i, 1);
			}
		};

		line.prototype.updateDist = function() {
			var dx = this.target.x - this.x,
				dy = this.target.y - this.y;
			this.dist = Math.sqrt(dx * dx + dy * dy);
		}
		line.prototype.updateAngle = function() {
			var dx = this.target.x - this.x,
				dy = this.target.y - this.y;
			this.angle = Math.atan2(dy, dx);
		}
		line.prototype.changeTarget = function() {
			var randStart = randInt(0, 3);
			switch (randStart) {
				case 0: // up
					this.target.y = this.y - size;
					break;
				case 1: // right
					this.target.x = this.x + size;
					break;
				case 2: // down
					this.target.y = this.y + size;
					break;
				case 3: // left
					this.target.x = this.x - size;
			}
			this.updateAngle();
		};
		line.prototype.draw = function(i) {
			ctx.beginPath();
			var rando = rand(0, 10);
			for (var j = 0, length = this.path.length; j < length; j++) {
				ctx[(j === 0) ? 'moveTo' : 'lineTo'](this.path[j].x + rand(-rando, rando), this.path[j].y + rand(-rando, rando));
			}
			ctx.strokeStyle = 'hsla(' + rand(this.hue, this.hue + 30) + ', 80%, 55%, ' + (this.life / 3) + ')';
			ctx.lineWidth = rand(0.1, 2);
			ctx.stroke();
		};
		function rand(min, max) {
			return Math.random() * (max - min) + min;
		}
		function randInt(min, max) {
			return Math.floor(min + Math.random() * (max - min + 1));
		};
		function init() {
			canvas = document.getElementById('canvas');
			ctx = canvas.getContext('2d');
			size = 30;
			lines = [];
			reset();
			loop();
		}
		function reset() {
			width = Math.ceil(window.innerWidth / 2) * 2;
			height = Math.ceil(window.innerHeight / 2) * 2;
			tick = 0;

			lines.length = 0;
			canvas.width = width;
			canvas.height = height;
		}
		function create() {
			if (tick % 10 === 0) {
				lines.push(new line());
			}
		}
		function step() {
			var i = lines.length;
			while (i--) {
				lines[i].step(i);
			}
		}
		function clear() {
			ctx.globalCompositeOperation = 'destination-out';
			ctx.fillStyle = 'hsla(0, 0%, 0%, 0.1';
			ctx.fillRect(0, 0, width, height);
			ctx.globalCompositeOperation = 'lighter';
		}
		function draw() {
			ctx.save();
			ctx.translate(width / 2, height / 2);
			ctx.rotate(tick * 0.001);
			var scale = 0.8 + Math.cos(tick * 0.02) * 0.2;
			ctx.scale(scale, scale);
			ctx.translate(-width / 2, -height / 2);
			var i = lines.length;
			while (i--) {
				lines[i].draw(i);
			}
			ctx.restore();
		}
		function loop() {
			requestAnimationFrame(loop);
			create();
			step();
			clear();
			draw();
			tick++;
		}
		function onresize() {
			reset();
		}
		window.addEventListener('resize', onresize);
		init();
	</script>
</body>
</html>
HTML,
            3 => <<<HTML
<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>io-fx03 - hinav</title>
  <script src="../js/jquery.min.js"></script>
  <style>
    html, body { background: #1B1D1F; margin: 0; padding:0;}
    canvas { width: 100%; height: 100%; position: absolute; }
  </style>
</head>
<body>
  <canvas width="1920" height="1040"></canvas>
  <script>
    $(function(){
      var canvas = document.querySelector('canvas'),
          ctx = canvas.getContext('2d')
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      ctx.lineWidth = .3;
      ctx.strokeStyle = (new Color(150)).style;

      var mousePosition = {
        x: 30 * canvas.width / 100,
        y: 30 * canvas.height / 100
      };

      var dots = {
        nb: 150,
        distance: 50,
        d_radius: 100,
        array: []
      };

      function colorValue(min) {
        return Math.floor(Math.random() * 255 + min);
      }

      function createColorStyle(r,g,b) {
        return 'rgba(' + r + ',' + g + ',' + b + ', 0.8)';
      }

      function mixComponents(comp1, weight1, comp2, weight2) {
        return (comp1 * weight1 + comp2 * weight2) / (weight1 + weight2);
      }

      function averageColorStyles(dot1, dot2) {
        var color1 = dot1.color,
            color2 = dot2.color;

        var r = mixComponents(color1.r, dot1.radius, color2.r, dot2.radius),
            g = mixComponents(color1.g, dot1.radius, color2.g, dot2.radius),
            b = mixComponents(color1.b, dot1.radius, color2.b, dot2.radius);
        return createColorStyle(Math.floor(r), Math.floor(g), Math.floor(b));
      }

      function Color(min) {
        min = min || 0;
        this.r = colorValue(min);
        this.g = colorValue(min);
        this.b = colorValue(min);
        this.style = createColorStyle(this.r, this.g, this.b);
      }

      function Dot(){
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;

        this.vx = -.5 + Math.random();
        this.vy = -.5 + Math.random();

        this.radius = Math.random() * 2;

        this.color = new Color();
        //console.log(this);
      }

      Dot.prototype = {
        draw: function(){
          ctx.beginPath();
          ctx.fillStyle = this.color.style;
          ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
          ctx.fill();
        }
      };

      function createDots(){
        for(i = 0; i < dots.nb; i++){
          dots.array.push(new Dot());
        }
      }

      function moveDots() {
        for(i = 0; i < dots.nb; i++){

          var dot = dots.array[i];

          if(dot.y < 0 || dot.y > canvas.height){
            dot.vx = dot.vx;
            dot.vy = - dot.vy;
          }
          else if(dot.x < 0 || dot.x > canvas.width){
            dot.vx = - dot.vx;
            dot.vy = dot.vy;
          }
          dot.x += dot.vx;
          dot.y += dot.vy;
        }
      }

      function connectDots() {
        for(i = 0; i < dots.nb; i++){
          for(j = 0; j < dots.nb; j++){
            i_dot = dots.array[i];
            j_dot = dots.array[j];

            if((i_dot.x - j_dot.x) < dots.distance && (i_dot.y - j_dot.y) < dots.distance && (i_dot.x - j_dot.x) > - dots.distance && (i_dot.y - j_dot.y) > - dots.distance){
              if((i_dot.x - mousePosition.x) < dots.d_radius && (i_dot.y - mousePosition.y) < dots.d_radius && (i_dot.x - mousePosition.x) > - dots.d_radius && (i_dot.y - mousePosition.y) > - dots.d_radius){
                ctx.beginPath();
                ctx.strokeStyle = averageColorStyles(i_dot, j_dot);
                ctx.moveTo(i_dot.x, i_dot.y);
                ctx.lineTo(j_dot.x, j_dot.y);
                ctx.stroke();
                ctx.closePath();
              }
            }
          }
        }
      }

      function drawDots() {
        for(i = 0; i < dots.nb; i++){
          var dot = dots.array[i];
          dot.draw();
        }
      }

      function animateDots() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        moveDots();
        connectDots();
        drawDots();

        requestAnimationFrame(animateDots);
      }

      $('canvas').on('mousemove', function(e){
        mousePosition.x = e.pageX;
        mousePosition.y = e.pageY;
      });

      $('canvas').on('mouseleave', function(e){
        mousePosition.x = canvas.width / 2;
        mousePosition.y = canvas.height / 2;
      });

      createDots();
      requestAnimationFrame(animateDots);
    });
  </script>
</body>
</html>
HTML,
            4 => <<<HTML
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>io-fx04 - hinav</title>
  <style>
    html {
      height: 100%;
      background-image: -webkit-radial-gradient(ellipse farthest-corner at center top, #000d4d 0%, #000105 100%);
      background-image: radial-gradient(ellipse farthest-corner at center top, #000d4d 0%, #000105 100%);
      cursor: move;
    }

    body {
      width: 100%;
      margin: 0;
      overflow: hidden;
    }
  </style>
</head>

<body>

  <canvas id="canv" width="1920" height="1040"></canvas>

  <script>
    var num = 200;
    var w = window.innerWidth;
    var h = window.innerHeight;
    var max = 100;
    var _x = 0;
    var _y = 0;
    var _z = 150;
    var dtr = function(d) {
      return d * Math.PI / 180;
    };

    var rnd = function() {
      return Math.sin(Math.floor(Math.random() * 360) * Math.PI / 180);
    };
    var dist = function(p1, p2, p3) {
      return Math.sqrt(Math.pow(p2.x - p1.x, 2) + Math.pow(p2.y - p1.y, 2) + Math.pow(p2.z - p1.z, 2));
    };

    var cam = {
      obj: {
        x: _x,
        y: _y,
        z: _z
      },
      dest: {
        x: 0,
        y: 0,
        z: 1
      },
      dist: {
        x: 0,
        y: 0,
        z: 200
      },
      ang: {
        cplane: 0,
        splane: 0,
        ctheta: 0,
        stheta: 0
      },
      zoom: 1,
      disp: {
        x: w / 2,
        y: h / 2,
        z: 0
      },
      upd: function() {
        cam.dist.x = cam.dest.x - cam.obj.x;
        cam.dist.y = cam.dest.y - cam.obj.y;
        cam.dist.z = cam.dest.z - cam.obj.z;
        cam.ang.cplane = -cam.dist.z / Math.sqrt(cam.dist.x * cam.dist.x + cam.dist.z * cam.dist.z);
        cam.ang.splane = cam.dist.x / Math.sqrt(cam.dist.x * cam.dist.x + cam.dist.z * cam.dist.z);
        cam.ang.ctheta = Math.sqrt(cam.dist.x * cam.dist.x + cam.dist.z * cam.dist.z) / Math.sqrt(cam.dist.x * cam.dist.x + cam.dist.y * cam.dist.y + cam.dist.z * cam.dist.z);
        cam.ang.stheta = -cam.dist.y / Math.sqrt(cam.dist.x * cam.dist.x + cam.dist.y * cam.dist.y + cam.dist.z * cam.dist.z);
      }
    };

    var trans = {
      parts: {
        sz: function(p, sz) {
          return {
            x: p.x * sz.x,
            y: p.y * sz.y,
            z: p.z * sz.z
          };
        },
        rot: {
          x: function(p, rot) {
            return {
              x: p.x,
              y: p.y * Math.cos(dtr(rot.x)) - p.z * Math.sin(dtr(rot.x)),
              z: p.y * Math.sin(dtr(rot.x)) + p.z * Math.cos(dtr(rot.x))
            };
          },
          y: function(p, rot) {
            return {
              x: p.x * Math.cos(dtr(rot.y)) + p.z * Math.sin(dtr(rot.y)),
              y: p.y,
              z: -p.x * Math.sin(dtr(rot.y)) + p.z * Math.cos(dtr(rot.y))
            };
          },
          z: function(p, rot) {
            return {
              x: p.x * Math.cos(dtr(rot.z)) - p.y * Math.sin(dtr(rot.z)),
              y: p.x * Math.sin(dtr(rot.z)) + p.y * Math.cos(dtr(rot.z)),
              z: p.z
            };
          }
        },
        pos: function(p, pos) {
          return {
            x: p.x + pos.x,
            y: p.y + pos.y,
            z: p.z + pos.z
          };
        }
      },
      pov: {
        plane: function(p) {
          return {
            x: p.x * cam.ang.cplane + p.z * cam.ang.splane,
            y: p.y,
            z: p.x * -cam.ang.splane + p.z * cam.ang.cplane
          };
        },
        theta: function(p) {
          return {
            x: p.x,
            y: p.y * cam.ang.ctheta - p.z * cam.ang.stheta,
            z: p.y * cam.ang.stheta + p.z * cam.ang.ctheta
          };
        },
        set: function(p) {
          return {
            x: p.x - cam.obj.x,
            y: p.y - cam.obj.y,
            z: p.z - cam.obj.z
          };
        }
      },
      persp: function(p) {
        return {
          x: p.x * cam.dist.z / p.z * cam.zoom,
          y: p.y * cam.dist.z / p.z * cam.zoom,
          z: p.z * cam.zoom,
          p: cam.dist.z / p.z
        };
      },
      disp: function(p, disp) {
        return {
          x: p.x + disp.x,
          y: -p.y + disp.y,
          z: p.z + disp.z,
          p: p.p
        };
      },
      steps: function(_obj_, sz, rot, pos, disp) {
        var _args = trans.parts.sz(_obj_, sz);
        _args = trans.parts.rot.x(_args, rot);
        _args = trans.parts.rot.y(_args, rot);
        _args = trans.parts.rot.z(_args, rot);
        _args = trans.parts.pos(_args, pos);
        _args = trans.pov.plane(_args);
        _args = trans.pov.theta(_args);
        _args = trans.pov.set(_args);
        _args = trans.persp(_args);
        _args = trans.disp(_args, disp);
        return _args;
      }
    };

    (function() {
      "use strict";
      var threeD = function(param) {
        this.transIn = {};
        this.transOut = {};
        this.transIn.vtx = (param.vtx);
        this.transIn.sz = (param.sz);
        this.transIn.rot = (param.rot);
        this.transIn.pos = (param.pos);
      };

      threeD.prototype.vupd = function() {
        this.transOut = trans.steps(

          this.transIn.vtx,
          this.transIn.sz,
          this.transIn.rot,
          this.transIn.pos,
          cam.disp
        );
      };

      var Build = function() {
        this.vel = 0.04;
        this.lim = 360;
        this.diff = 200;
        this.initPos = 100;
        this.toX = _x;
        this.toY = _y;
        this.go();
      };

      Build.prototype.go = function() {
        this.canvas = document.getElementById("canv");
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
        this.$ = canv.getContext("2d");
        this.$.globalCompositeOperation = 'source-over';
        this.varr = [];
        this.dist = [];
        this.calc = [];

        for (var i = 0, len = num; i < len; i++) {
          this.add();
        }

        this.rotObj = {
          x: 0,
          y: 0,
          z: 0
        };
        this.objSz = {
          x: w / 5,
          y: h / 5,
          z: w / 5
        };
      };

      Build.prototype.add = function() {
        this.varr.push(new threeD({
          vtx: {
            x: rnd(),
            y: rnd(),
            z: rnd()
          },
          sz: {
            x: 0,
            y: 0,
            z: 0
          },
          rot: {
            x: 20,
            y: -20,
            z: 0
          },
          pos: {
            x: this.diff * Math.sin(360 * Math.random() * Math.PI / 180),
            y: this.diff * Math.sin(360 * Math.random() * Math.PI / 180),
            z: this.diff * Math.sin(360 * Math.random() * Math.PI / 180)
          }
        }));
        this.calc.push({
          x: 360 * Math.random(),
          y: 360 * Math.random(),
          z: 360 * Math.random()
        });
      };

      Build.prototype.upd = function() {
        cam.obj.x += (this.toX - cam.obj.x) * 0.05;
        cam.obj.y += (this.toY - cam.obj.y) * 0.05;
      };

      Build.prototype.draw = function() {
        this.$.clearRect(0, 0, this.canvas.width, this.canvas.height);
        cam.upd();
        this.rotObj.x += 0.1;
        this.rotObj.y += 0.1;
        this.rotObj.z += 0.1;

        for (var i = 0; i < this.varr.length; i++) {
          for (var val in this.calc[i]) {
            if (this.calc[i].hasOwnProperty(val)) {
              this.calc[i][val] += this.vel;
              if (this.calc[i][val] > this.lim) this.calc[i][val] = 0;
            }
          }

          this.varr[i].transIn.pos = {
            x: this.diff * Math.cos(this.calc[i].x * Math.PI / 180),
            y: this.diff * Math.sin(this.calc[i].y * Math.PI / 180),
            z: this.diff * Math.sin(this.calc[i].z * Math.PI / 180)
          };
          this.varr[i].transIn.rot = this.rotObj;
          this.varr[i].transIn.sz = this.objSz;
          this.varr[i].vupd();
          if (this.varr[i].transOut.p < 0) continue;
          var g = this.$.createRadialGradient(this.varr[i].transOut.x, this.varr[i].transOut.y, this.varr[i].transOut.p, this.varr[i].transOut.x, this.varr[i].transOut.y, this.varr[i].transOut.p * 2);
          this.$.globalCompositeOperation = 'lighter';
          g.addColorStop(0, 'hsla(255, 255%, 255%, 1)');
          g.addColorStop(.5, 'hsla(' + (i + 2) + ',85%, 40%,1)');
          g.addColorStop(1, 'hsla(' + (i) + ',85%, 40%,.5)');
          this.$.fillStyle = g;
          this.$.beginPath();
          this.$.arc(this.varr[i].transOut.x, this.varr[i].transOut.y, this.varr[i].transOut.p * 2, 0, Math.PI * 2, false);
          this.$.fill();
          this.$.closePath();
        }
      };
      Build.prototype.anim = function() {
        window.requestAnimationFrame = (function() {
          return window.requestAnimationFrame ||
            function(callback, element) {
              window.setTimeout(callback, 1000 / 60);
            };
        })();
        var anim = function() {
          this.upd();
          this.draw();
          window.requestAnimationFrame(anim);
        }.bind(this);
        window.requestAnimationFrame(anim);
      };

      Build.prototype.run = function() {
        this.anim();

        window.addEventListener('mousemove', function(e) {
          this.toX = (e.clientX - this.canvas.width / 2) * -0.8;
          this.toY = (e.clientY - this.canvas.height / 2) * 0.8;
        }.bind(this));
        window.addEventListener('touchmove', function(e) {
          e.preventDefault();
          this.toX = (e.touches[0].clientX - this.canvas.width / 2) * -0.8;
          this.toY = (e.touches[0].clientY - this.canvas.height / 2) * 0.8;
        }.bind(this));
        window.addEventListener('mousedown', function(e) {
          for (var i = 0; i < 100; i++) {
            this.add();
          }
        }.bind(this));
        window.addEventListener('touchstart', function(e) {
          e.preventDefault();
          for (var i = 0; i < 100; i++) {
            this.add();
          }
        }.bind(this));
      };
      var app = new Build();
      app.run();
    })();
    window.addEventListener('resize', function() {
      canvas.width = w = window.innerWidth;
      canvas.height = h = window.innerHeight;
    }, false);
  </script>

</body>
</html>
HTML,
            5 => <<<HTML
<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>io-fx05 - hinav</title>
    <style>
        html, body { margin: 0px; width: 100%; height: 100%; overflow: hidden; background: #000; }
        #canvas { position: absolute; width: 100%; height: 100%; }
    </style>
</head>
<body>
    <canvas id="canvas" width="1920" height="1040"></canvas>
    <script>
        function project3D(x,y,z,vars){var p,d;x-=vars.camX;y-=vars.camY-8;z-=vars.camZ;p=Math.atan2(x,z);d=Math.sqrt(x*x+z*z);x=Math.sin(p-vars.yaw)*d;z=Math.cos(p-vars.yaw)*d;p=Math.atan2(y,z);d=Math.sqrt(y*y+z*z);y=Math.sin(p-vars.pitch)*d;z=Math.cos(p-vars.pitch)*d;var rx1=-1000;var ry1=1;var rx2=1000;var ry2=1;var rx3=0;var ry3=0;var rx4=x;var ry4=z;var uc=(ry4-ry3)*(rx2-rx1)-(rx4-rx3)*(ry2-ry1);var ua=((rx4-rx3)*(ry1-ry3)-(ry4-ry3)*(rx1-rx3))/uc;var ub=((rx2-rx1)*(ry1-ry3)-(ry2-ry1)*(rx1-rx3))/uc;if(!z)z=0.000000001;if(ua>0&&ua<1&&ub>0&&ub<1){return{x:vars.cx+(rx1+ua*(rx2-rx1))*vars.scale,y:vars.cy+y/z*vars.scale,d:(x*x+y*y+z*z)}}else{return{d:-1}}}function elevation(x,y,z){var dist=Math.sqrt(x*x+y*y+z*z);if(dist&&z/dist>=-1&&z/dist<=1)return Math.acos(z/dist);return 0.00000001}function rgb(col){col+=0.000001;var r=parseInt((0.5+Math.sin(col)*0.5)*16);var g=parseInt((0.5+Math.cos(col)*0.5)*16);var b=parseInt((0.5-Math.sin(col)*0.5)*16);return"#"+r.toString(16)+g.toString(16)+b.toString(16)}function interpolateColors(RGB1,RGB2,degree){var w2=degree;var w1=1-w2;return[w1*RGB1[0]+w2*RGB2[0],w1*RGB1[1]+w2*RGB2[1],w1*RGB1[2]+w2*RGB2[2]]}function rgbArray(col){col+=0.000001;var r=parseInt((0.5+Math.sin(col)*0.5)*256);var g=parseInt((0.5+Math.cos(col)*0.5)*256);var b=parseInt((0.5-Math.sin(col)*0.5)*256);return[r,g,b]}function colorString(arr){var r=parseInt(arr[0]);var g=parseInt(arr[1]);var b=parseInt(arr[2]);return"#"+("0"+r.toString(16)).slice(-2)+("0"+g.toString(16)).slice(-2)+("0"+b.toString(16)).slice(-2)}function process(vars){if(vars.points.length<vars.initParticles)for(var i=0;i<5;++i)spawnParticle(vars);var p,d,t;p=Math.atan2(vars.camX,vars.camZ);d=Math.sqrt(vars.camX*vars.camX+vars.camZ*vars.camZ);d-=Math.sin(vars.frameNo/80)/25;t=Math.cos(vars.frameNo/300)/165;vars.camX=Math.sin(p+t)*d;vars.camZ=Math.cos(p+t)*d;vars.camY=-Math.sin(vars.frameNo/220)*15;vars.yaw=Math.PI+p+t;vars.pitch=elevation(vars.camX,vars.camZ,vars.camY)-Math.PI/2;var t;for(var i=0;i<vars.points.length;++i){x=vars.points[i].x;y=vars.points[i].y;z=vars.points[i].z;d=Math.sqrt(x*x+z*z)/1.0075;t=.1/(1+d*d/5);p=Math.atan2(x,z)+t;vars.points[i].x=Math.sin(p)*d;vars.points[i].z=Math.cos(p)*d;vars.points[i].y+=vars.points[i].vy*t*((Math.sqrt(vars.distributionRadius)-d)*2);if(vars.points[i].y>vars.vortexHeight/2||d<.25){vars.points.splice(i,1);spawnParticle(vars)}}}function drawFloor(vars){var x,y,z,d,point,a;for(var i=-25;i<=25;i+=1){for(var j=-25;j<=25;j+=1){x=i*2;z=j*2;y=vars.floor;d=Math.sqrt(x*x+z*z);point=project3D(x,y-d*d/85,z,vars);if(point.d!=-1){size=1+15000/(1+point.d);a=0.15-Math.pow(d/50,4)*0.15;if(a>0){vars.ctx.fillStyle=colorString(interpolateColors(rgbArray(d/26-vars.frameNo/40),[0,128,32],.5+Math.sin(d/6-vars.frameNo/8)/2));vars.ctx.globalAlpha=a;vars.ctx.fillRect(point.x-size/2,point.y-size/2,size,size)}}}}vars.ctx.fillStyle="#82f";for(var i=-25;i<=25;i+=1){for(var j=-25;j<=25;j+=1){x=i*2;z=j*2;y=-vars.floor;d=Math.sqrt(x*x+z*z);point=project3D(x,y+d*d/85,z,vars);if(point.d!=-1){size=1+15000/(1+point.d);a=0.15-Math.pow(d/50,4)*0.15;if(a>0){vars.ctx.fillStyle=colorString(interpolateColors(rgbArray(-d/26-vars.frameNo/40),[32,0,128],.5+Math.sin(-d/6-vars.frameNo/8)/2));vars.ctx.globalAlpha=a;vars.ctx.fillRect(point.x-size/2,point.y-size/2,size,size)}}}}}function sortFunction(a,b){return b.dist-a.dist}function draw(vars){vars.ctx.globalAlpha=.15;vars.ctx.fillStyle="#000";vars.ctx.fillRect(0,0,canvas.width,canvas.height);drawFloor(vars);var point,x,y,z,a;for(var i=0;i<vars.points.length;++i){x=vars.points[i].x;y=vars.points[i].y;z=vars.points[i].z;point=project3D(x,y,z,vars);if(point.d!=-1){vars.points[i].dist=point.d;size=1+vars.points[i].radius/(1+point.d);d=Math.abs(vars.points[i].y);a=.8-Math.pow(d/(vars.vortexHeight/2),1000)*.8;vars.ctx.globalAlpha=a>=0&&a<=1?a:0;vars.ctx.fillStyle=rgb(vars.points[i].color);if(point.x>-1&&point.x<vars.canvas.width&&point.y>-1&&point.y<vars.canvas.height)vars.ctx.fillRect(point.x-size/2,point.y-size/2,size,size)}}vars.points.sort(sortFunction)}function spawnParticle(vars){var p,ls;pt={};p=Math.PI*2*Math.random();ls=Math.sqrt(Math.random()*vars.distributionRadius);pt.x=Math.sin(p)*ls;pt.y=-vars.vortexHeight/2;pt.vy=vars.initV/20+Math.random()*vars.initV;pt.z=Math.cos(p)*ls;pt.radius=200+800*Math.random();pt.color=pt.radius/1000+vars.frameNo/250;vars.points.push(pt)}function frame(vars){if(vars===undefined){var vars={};vars.canvas=document.querySelector("canvas");vars.ctx=vars.canvas.getContext("2d");vars.canvas.width=document.body.clientWidth;vars.canvas.height=document.body.clientHeight;window.addEventListener("resize",function(){vars.canvas.width=document.body.clientWidth;vars.canvas.height=document.body.clientHeight;vars.cx=vars.canvas.width/2;vars.cy=vars.canvas.height/2},true);vars.frameNo=0;vars.camX=0;vars.camY=0;vars.camZ=-14;vars.pitch=elevation(vars.camX,vars.camZ,vars.camY)-Math.PI/2;vars.yaw=0;vars.cx=vars.canvas.width/2;vars.cy=vars.canvas.height/2;vars.bounding=10;vars.scale=500;vars.floor=26.5;vars.points=[];vars.initParticles=1000;vars.initV=.01;vars.distributionRadius=800;vars.vortexHeight=25}vars.frameNo++;requestAnimationFrame(function(){frame(vars)});process(vars);draw(vars)}frame();
    </script>
</body>
</html>
HTML,
            6 => <<<HTML
<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>io-fx06 - hinav</title>
  <style>
    body{background-color:#1B1D1F;overflow: hidden}
    canvas{position:absolute;top:calc( 50% - 250px );left:calc( 50% - 250px );box-shadow:0 0 2px #1B1D1F;border-radius:250px;}
    p{font:20px Helvetica;color:#eee;position:absolute;width:500px;text-align:center;top:calc( 50% - 300px );left:calc( 50% - 250px );}
  </style>
</head>
<body>
  <canvas id="c" height="500" width="500"></canvas>
  <script>
    var s = c.width = c.height = 500
    , ctx = c.getContext( '2d' )
    , opts = {
      particles: 200,
      particleBaseSize: 4,
      particleAddedSize: 1,
      particleMaxSize: 5,
      particleBaseLight: 5,
      particleAddedLight: 30,
      particleBaseBaseAngSpeed: .001,
      particleAddedBaseAngSpeed: .001,
      particleBaseVariedAngSpeed: .0005,
      particleAddedVariedAngSpeed: .0005,
      sourceBaseSize: 3,
      sourceAddedSize: 3,
      sourceBaseAngSpeed: -.01,
      sourceVariedAngSpeed: .005,
      sourceBaseDist: 130,
      sourceVariedDist: 50,
      particleTemplateColor: 'hsla(hue,80%,light%,alp)',
      repaintColor: 'rgba(24,24,24,.1)',
      enableTrails: false
    }
    , util = {
      square: x => x*x,
      tau: 6.2831853071795864769252867665590057683943
    }
    , particles = []
    , source = new Source
    , tick = 0;
    function Particle() {
      this.dist = ( Math.sqrt( Math.random() ) ) * s / 2;
      this.rad = Math.random() * util.tau;
      this.baseAngSpeed = opts.particleBaseBaseAngSpeed + opts.particleAddedBaseAngSpeed * Math.random();
      this.variedAngSpeed = opts.particleBaseVariedAngSpeed + opts.particleAddedVariedAngSpeed * Math.random();
      this.size = opts.particleBaseSize + opts.particleAddedSize * Math.random();
    }
    Particle.prototype.step = function() {
      var angSpeed = this.baseAngSpeed + this.variedAngSpeed * Math.sin( this.rad * 7 + tick / 100 );
      this.rad += angSpeed;
      var x = this.dist * Math.cos( this.rad )
        , y = this.dist * Math.sin( this.rad )
        , squareDist = util.square( x - source.x ) + util.square( y - source.y )
        , sizeProp = Math.pow( s, 1/2 ) / Math.pow( squareDist, 1/2 )
        , color = opts.particleTemplateColor
          .replace( 'hue', this.rad / util.tau * 360 + tick )
          .replace( 'light', opts.particleBaseLight + sizeProp * opts.particleAddedLight )
          .replace( 'alp', .8 );
      ctx.fillStyle = color;
      ctx.beginPath();
      ctx.arc( x, y, Math.min( this.size * sizeProp, opts.particleMaxSize ), 0, util.tau );
      ctx.fill();
    }
    function Source() {
      this.x = 0;
      this.y = 0;
      this.rad = Math.random() * util.tau;
    }
    Source.prototype.step = function() {
      if( !this.mouseControlled ) {
        var angSpeed = opts.sourceBaseAngSpeed + Math.sin( this.rad * 6 + tick / 100 ) * opts.sourceVariedAngSpeed;
        this.rad += angSpeed;
        var dist = opts.sourceBaseDist + Math.sin( this.rad * 5 + tick / 100 ) * opts.sourceVariedDist;
        this.x = dist * Math.cos( this.rad );
        this.y = dist * Math.sin( this.rad );
      }
      ctx.fillStyle = 'white';
      ctx.beginPath();
      ctx.arc( this.x, this.y, 1, 0, util.tau );
      ctx.fill();
    }
    function anim() {
      window.requestAnimationFrame( anim );
      ++tick;
      if( !opts.enableTrails )
        ctx.globalCompositeOperation = 'source-over';
      ctx.fillStyle = opts.repaintColor;
      ctx.fillRect( 0, 0, s, s );
      ctx.globalCompositeOperation = 'lighter';
      if( particles.length < opts.particles )
        particles.push( new Particle );
      ctx.translate( s/2, s/2 );
      source.step();
      particles.map( particle => particle.step() );
      ctx.translate( -s/2, -s/2 );
    }

    ctx.fillStyle = '#222';
    ctx.fillRect( 0, 0, s, s );
    anim();

    c.addEventListener( 'mousemove', ( e ) => {

      var bbox = c.getBoundingClientRect();

      source.x = e.clientX - bbox.left - s/2;
      source.y = e.clientY - bbox.top - s/2;
      source.mouseControlled = true;
    })
    c.addEventListener( 'mouseleave', ( e ) => {
      var bbox = c.getBoundingClientRect();
      source.x = e.clientX - bbox.left - s/2;
      source.y = e.clientY - bbox.top - s/2;
      source.rad = Math.atan( source.y / source.x );
      if( source.x < 0 )
        source.rad += Math.PI;
      source.mouseControlled = false;
    })
  </script>
</body>
</html>
HTML,
            7 => <<<HTML
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>io-fx07 - hinav</title>
  <style>
    html, body { background: #1B1D1F;background-image:linear-gradient(to top,#141626 0%,#040319 80%); margin: 0; padding:0;height: 100vh;width: 100%;}
    .banner-wrap,#stage {width:100%;height:100%;}
    #stage {overflow:hidden;position:relative;z-index:0;}
    #stage .space {width:3840px;height:100%;position:absolute;top:0;left:0;z-index:0;background:url(/asset/imgs/fx/space.png) repeat-x;}
    #stage .mountains {width:100%;height:17.78125em;overflow:hidden;position:absolute;left:0;bottom:0;z-index:1;opacity:0;-webkit-transition:opacity 0.2s linear 0s;-moz-transition:opacity 0.2s linear 0s;transition:opacity 0.2s linear 0s;-webkit-transform-origin:center top;-moz-transform-origin:center top;transform-origin:center top;}
    #stage .mountain {width:240em;position:absolute;left:0;bottom:0;}
    #stage .mountain-1 {height:10.5em;z-index:3;background:url(/asset/imgs/fx/mountain-1.png) repeat-x;background-size:auto 50%;background-position:0 bottom;}
    #stage .mountain-2 {height:12em;z-index:2;background:url(/asset/imgs/fx/mountain-2.png) repeat-x;background-size:auto 50%;background-position:0 bottom;}
    #stage .mountain-3 {height:17.78125em;z-index:1;background:url(/asset/imgs/fx/mountain-3.png) repeat-x;background-size:auto 30%;background-position:0 bottom;}
    #stage .bear-wrapper {width:6.25em;height:3.125em;position:absolute;margin-left:-3.125em;left:50%;bottom:40px;z-index:999;}
    #stage .bear {width:3.12em;height:1.625em;position:absolute;margin-left:-1.5625em;left:-4%;bottom:20px;z-index:999;background:url("/asset/imgs/fx/bear.png") 0 0 no-repeat;background-size:25em 100%;opacity:0;}
    .scenes-ready #stage .space {-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);transform:translate3d(0,0,0);-webkit-animation:moving 450s linear 0.8s infinite normal none;-moz-animation:moving 450s linear 0.8s infinite normal none;animation:moving 450s linear 0.8s infinite normal none;}
    .scenes-ready #stage .mountains {opacity:1;-webkit-animation:mountains-in 0.8s ease-out 0s 1 normal forwards;-moz-animation:mountains-in 0.8s ease-out 0s 1 normal forwards;animation:mountains-in 0.8s ease-out 0s 1 normal forwards;}
    .scenes-ready #stage .mountain-1 {-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);transform:translate3d(0,0,0);-webkit-animation:moving 100s linear 0.8s infinite normal none;-moz-animation:moving 100s linear 0.8s infinite normal none;animation:moving 100s linear 0.8s infinite normal none;}
    .scenes-ready #stage .mountain-2 {-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);transform:translate3d(0,0,0);-webkit-animation:moving 160s linear 0.8s infinite normal none;-moz-animation:moving 160s linear 0.8s infinite normal none;animation:moving 160s linear 0.8s infinite normal none;}
    .scenes-ready #stage .mountain-3 {-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);transform:translate3d(0,0,0);-webkit-animation:moving 360s linear 0.8s infinite normal none;-moz-animation:moving 360s linear 0.8s infinite normal none;animation:moving 360s linear 0.8s infinite normal none;}
    .scenes-ready #stage .bear {opacity:1;-webkit-transition:opacity 0.4s linear 0.6s;-moz-transition:opacity 0.4s linear 0.6s;transition:opacity 0.4s linear 0.6s;}
    .scenes-ready #stage .bear {-webkit-animation:bear-run-in 3.6s step-end 0.6s 1 normal forwards,bear-run 0.8s steps(8) 4.2s infinite normal forwards;-moz-animation:bear-run-in 3.6s step-end 0.6s 1 normal forwards,bear-run 0.8s steps(8) 4.2s infinite normal forwards;animation:bear-run-in 3.6s step-end 0.6s 1 normal forwards,bear-run 0.8s steps(8) 4.2s infinite normal forwards;}
    .scenes-ready #stage .bear.reset{left:50%;opacity:1;-webkit-animation:none 0s linear 0s infinite normal none;-moz-animation:none 0s linear 0s infinite normal none;animation:none 0s linear 0s infinite normal none;}
    .scenes-ready #stage .bear.running{left:50%;-webkit-animation:bear-run 0.8s steps(8) 0s infinite normal none;-moz-animation:bear-run 0.8s steps(8) 0s infinite normal none;animation:bear-run 0.8s steps(8) 0s infinite normal none;}
    @-webkit-keyframes mountains-in {0% {-webkit-transform:scale(1.5);}
    100% {-webkit-transform:scale(1);}
    }
    @-moz-keyframes mountains-in {0% {-moz-transform:scale(1.5);}
    100% {-moz-transform:scale(1);}
    }
    @keyframes mountains-in {0% {transform:scale(1.5);}
    100% {transform:scale(1);}
    }
    @-webkit-keyframes moving {0% {-webkit-transform:translate3d(0,0,0);}
    100% {-webkit-transform:translate3d(-50%,0,0);}
    }
    @-moz-keyframes moving {0% {-moz-transform:translate3d(0,0,0);}
    100% {-moz-transform:translate3d(-50%,0,0);}
    }
    @keyframes moving {0% {transform:translate3d(0,0,0);}
    100% {transform:translate3d(-50%,0,0);}
    }
    @-webkit-keyframes bear-run {0% {background-position:0 0;}
    100% {background-position:-25em 0;}
    }
    @-moz-keyframes bear-run {0% {background-position:0 0;}
    100% {background-position:-25em 0;}
    }
    @keyframes bear-run {0% {background-position:0 0;}
    100% {background-position:-25em 0;}
    }
    @-webkit-keyframes bear-run-in {0% {background-position:0em 0;left:-4%;}
    1.38888889% {background-position:-3.125em 0;left:-2.25%;}
    2.77777778% {background-position:-6.25em 0;left:-0.5%;}
    4.16666667% {background-position:-9.375em 0;left:1.25%;}
    5.55555556% {background-position:-12.5em 0;left:3%;}
    6.94444444% {background-position:-15.625em 0;left:4.75%;}
    8.33333333% {background-position:-18.75em 0;left:6.5%;}
    9.72222222% {background-position:-21.875em 0;left:8.25%;}
    11.11111111% {background-position:-25em 0;left:10%;}
    11.11111111% {background-position:0em 0;left:10%;}
    12.77777778% {background-position:-3.125em 0;left:11.5%;}
    14.44444444% {background-position:-6.25em 0;left:13%;}
    16.11111111% {background-position:-9.375em 0;left:14.5%;}
    17.77777778% {background-position:-12.5em 0;left:16%;}
    19.44444444% {background-position:-15.625em 0;left:17.5%;}
    21.11111111% {background-position:-18.75em 0;left:19%;}
    22.77777778% {background-position:-21.875em 0;left:20.5%;}
    24.44444444% {background-position:-25em 0;left:22%;}
    24.44444444% {background-position:0em 0;left:22%;}
    26.38888889% {background-position:-3.125em 0;left:23.25%;}
    28.33333333% {background-position:-6.25em 0;left:24.5%;}
    30.27777778% {background-position:-9.375em 0;left:25.75%;}
    32.22222222% {background-position:-12.5em 0;left:27%;}
    34.16666667% {background-position:-15.625em 0;left:28.25%;}
    36.11111111% {background-position:-18.75em 0;left:29.5%;}
    38.05555556% {background-position:-21.875em 0;left:30.75%;}
    40% {background-position:-25em 0;left:32%;}
    40% {background-position:0em 0;left:32%;}
    42.22222222% {background-position:-3.125em 0;left:33%;}
    44.44444444% {background-position:-6.25em 0;left:34%;}
    46.66666667% {background-position:-9.375em 0;left:35%;}
    48.88888889% {background-position:-12.5em 0;left:36%;}
    51.11111111% {background-position:-15.625em 0;left:37%;}
    53.33333333% {background-position:-18.75em 0;left:38%;}
    55.55555556% {background-position:-21.875em 0;left:39%;}
    57.77777778% {background-position:-25em 0;left:40%;}
    57.77777778% {background-position:0em 0;left:40%;}
    60.27777778% {background-position:-3.125em 0;left:40.75%;}
    62.77777778% {background-position:-6.25em 0;left:41.5%;}
    65.27777778% {background-position:-9.375em 0;left:42.25%;}
    67.77777778% {background-position:-12.5em 0;left:43%;}
    70.27777778% {background-position:-15.625em 0;left:43.75%;}
    72.77777778% {background-position:-18.75em 0;left:44.5%;}
    75.27777778% {background-position:-21.875em 0;left:45.25%;}
    77.77777778% {background-position:-25em 0;left:46%;}
    77.77777778% {background-position:0em 0;left:46%;}
    80.55555556% {background-position:-3.125em 0;left:46.5%;}
    83.33333333% {background-position:-6.25em 0;left:47%;}
    86.11111111% {background-position:-9.375em 0;left:47.5%;}
    88.88888889% {background-position:-12.5em 0;left:48%;}
    91.66666667% {background-position:-15.625em 0;left:48.5%;}
    94.44444444% {background-position:-18.75em 0;left:49%;}
    97.22222222% {background-position:-21.875em 0;left:49.5%;}
    100% {background-position:-25em 0;left:50%;}
    }
    @-moz-keyframes bear-run-in {0% {background-position:0em 0;left:-4%;}
    1.38888889% {background-position:-3.125em 0;left:-2.25%;}
    2.77777778% {background-position:-6.25em 0;left:-0.5%;}
    4.16666667% {background-position:-9.375em 0;left:1.25%;}
    5.55555556% {background-position:-12.5em 0;left:3%;}
    6.94444444% {background-position:-15.625em 0;left:4.75%;}
    8.33333333% {background-position:-18.75em 0;left:6.5%;}
    9.72222222% {background-position:-21.875em 0;left:8.25%;}
    11.11111111% {background-position:-25em 0;left:10%;}
    11.11111111% {background-position:0em 0;left:10%;}
    12.77777778% {background-position:-3.125em 0;left:11.5%;}
    14.44444444% {background-position:-6.25em 0;left:13%;}
    16.11111111% {background-position:-9.375em 0;left:14.5%;}
    17.77777778% {background-position:-12.5em 0;left:16%;}
    19.44444444% {background-position:-15.625em 0;left:17.5%;}
    21.11111111% {background-position:-18.75em 0;left:19%;}
    22.77777778% {background-position:-21.875em 0;left:20.5%;}
    24.44444444% {background-position:-25em 0;left:22%;}
    24.44444444% {background-position:0em 0;left:22%;}
    26.38888889% {background-position:-3.125em 0;left:23.25%;}
    28.33333333% {background-position:-6.25em 0;left:24.5%;}
    30.27777778% {background-position:-9.375em 0;left:25.75%;}
    32.22222222% {background-position:-12.5em 0;left:27%;}
    34.16666667% {background-position:-15.625em 0;left:28.25%;}
    36.11111111% {background-position:-18.75em 0;left:29.5%;}
    38.05555556% {background-position:-21.875em 0;left:30.75%;}
    40% {background-position:-25em 0;left:32%;}
    40% {background-position:0em 0;left:32%;}
    42.22222222% {background-position:-3.125em 0;left:33%;}
    44.44444444% {background-position:-6.25em 0;left:34%;}
    46.66666667% {background-position:-9.375em 0;left:35%;}
    48.88888889% {background-position:-12.5em 0;left:36%;}
    51.11111111% {background-position:-15.625em 0;left:37%;}
    53.33333333% {background-position:-18.75em 0;left:38%;}
    55.55555556% {background-position:-21.875em 0;left:39%;}
    57.77777778% {background-position:-25em 0;left:40%;}
    57.77777778% {background-position:0em 0;left:40%;}
    60.27777778% {background-position:-3.125em 0;left:40.75%;}
    62.77777778% {background-position:-6.25em 0;left:41.5%;}
    65.27777778% {background-position:-9.375em 0;left:42.25%;}
    67.77777778% {background-position:-12.5em 0;left:43%;}
    70.27777778% {background-position:-15.625em 0;left:43.75%;}
    72.77777778% {background-position:-18.75em 0;left:44.5%;}
    75.27777778% {background-position:-21.875em 0;left:45.25%;}
    77.77777778% {background-position:-25em 0;left:46%;}
    77.77777778% {background-position:0em 0;left:46%;}
    80.55555556% {background-position:-3.125em 0;left:46.5%;}
    83.33333333% {background-position:-6.25em 0;left:47%;}
    86.11111111% {background-position:-9.375em 0;left:47.5%;}
    88.88888889% {background-position:-12.5em 0;left:48%;}
    91.66666667% {background-position:-15.625em 0;left:48.5%;}
    94.44444444% {background-position:-18.75em 0;left:49%;}
    97.22222222% {background-position:-21.875em 0;left:49.5%;}
    100% {background-position:-25em 0;left:50%;}
    }
    @keyframes bear-run-in {0% {background-position:0em 0;left:-4%;}
    1.38888889% {background-position:-3.125em 0;left:-2.25%;}
    2.77777778% {background-position:-6.25em 0;left:-0.5%;}
    4.16666667% {background-position:-9.375em 0;left:1.25%;}
    5.55555556% {background-position:-12.5em 0;left:3%;}
    6.94444444% {background-position:-15.625em 0;left:4.75%;}
    8.33333333% {background-position:-18.75em 0;left:6.5%;}
    9.72222222% {background-position:-21.875em 0;left:8.25%;}
    11.11111111% {background-position:-25em 0;left:10%;}
    11.11111111% {background-position:0em 0;left:10%;}
    12.77777778% {background-position:-3.125em 0;left:11.5%;}
    14.44444444% {background-position:-6.25em 0;left:13%;}
    16.11111111% {background-position:-9.375em 0;left:14.5%;}
    17.77777778% {background-position:-12.5em 0;left:16%;}
    19.44444444% {background-position:-15.625em 0;left:17.5%;}
    21.11111111% {background-position:-18.75em 0;left:19%;}
    22.77777778% {background-position:-21.875em 0;left:20.5%;}
    24.44444444% {background-position:-25em 0;left:22%;}
    24.44444444% {background-position:0em 0;left:22%;}
    26.38888889% {background-position:-3.125em 0;left:23.25%;}
    28.33333333% {background-position:-6.25em 0;left:24.5%;}
    30.27777778% {background-position:-9.375em 0;left:25.75%;}
    32.22222222% {background-position:-12.5em 0;left:27%;}
    34.16666667% {background-position:-15.625em 0;left:28.25%;}
    36.11111111% {background-position:-18.75em 0;left:29.5%;}
    38.05555556% {background-position:-21.875em 0;left:30.75%;}
    40% {background-position:-25em 0;left:32%;}
    40% {background-position:0em 0;left:32%;}
    42.22222222% {background-position:-3.125em 0;left:33%;}
    44.44444444% {background-position:-6.25em 0;left:34%;}
    46.66666667% {background-position:-9.375em 0;left:35%;}
    48.88888889% {background-position:-12.5em 0;left:36%;}
    51.11111111% {background-position:-15.625em 0;left:37%;}
    53.33333333% {background-position:-18.75em 0;left:38%;}
    55.55555556% {background-position:-21.875em 0;left:39%;}
    57.77777778% {background-position:-25em 0;left:40%;}
    57.77777778% {background-position:0em 0;left:40%;}
    60.27777778% {background-position:-3.125em 0;left:40.75%;}
    62.77777778% {background-position:-6.25em 0;left:41.5%;}
    65.27777778% {background-position:-9.375em 0;left:42.25%;}
    67.77777778% {background-position:-12.5em 0;left:43%;}
    70.27777778% {background-position:-15.625em 0;left:43.75%;}
    72.77777778% {background-position:-18.75em 0;left:44.5%;}
    75.27777778% {background-position:-21.875em 0;left:45.25%;}
    77.77777778% {background-position:-25em 0;left:46%;}
    77.77777778% {background-position:0em 0;left:46%;}
    80.55555556% {background-position:-3.125em 0;left:46.5%;}
    83.33333333% {background-position:-6.25em 0;left:47%;}
    86.11111111% {background-position:-9.375em 0;left:47.5%;}
    88.88888889% {background-position:-12.5em 0;left:48%;}
    91.66666667% {background-position:-15.625em 0;left:48.5%;}
    94.44444444% {background-position:-18.75em 0;left:49%;}
    97.22222222% {background-position:-21.875em 0;left:49.5%;}
    100% {background-position:-25em 0;left:50%;}
    }
  </style>
</head>
<body>

  <div class="banner-wrap scenes-ready">
		<div id="stage">
			<div class="space"></div>
			<div class="mountains">
				<div class="mountain mountain-1"></div>
				<div class="mountain mountain-2"></div>
				<div class="mountain mountain-3"></div>
			</div>
			<div class="bear"></div>
		</div>
	</div>


</body>
</html>
HTML


        ];

        return response(admin_setting(Constants::Index_Search_Background_Canvas, 0) == 0 ? $html[rand(1, 7)] : $html[admin_setting(Constants::Index_Search_Background_Canvas, 1)]);

    }
    #endregion
}
