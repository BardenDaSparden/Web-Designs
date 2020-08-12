

var Plexus = function (_id, _options) {
    var that = this;

    this.canvas = document.getElementById(_id);
    this.context = this.canvas.getContext("2d");

    this.points = [];
    this.config = {
        // Points
        pointsStartDistance : 90,
        pointsStartNoise : 100,
        pointsSpeed : 0.5,
        pointsRadius : 1,
        pointsColor : "#202020",
        pointsTargetRange : 100,
        pointsTargetOffset : 5,

        // Line
        lineSize : 3,
        lineColor : {
            r : 255,
            g : 255,
            b : 255,
            a : 0.08
        },
        lineDistance : 100,

        // Start
        targetsBoundsOffset : 200,
        cursorRadius : 200,
        enableClear: true
    };

    this.configOptimized = {
        lineDistance : null,
        pointsTargetRange : null,
        pointsTargetOffset : null,
        cursorRadius : null,
        lineColor : null
    };

    this.fit = function () {
        that.canvas.width = that.canvas.parentNode.offsetWidth;
        that.canvas.height = that.canvas.parentNode.offsetHeight;
    };

    this.setOptimizedConfig = function () {
        that.configOptimized.lineDistance = that.config.lineDistance * that.config.lineDistance;
        that.configOptimized.pointsTargetRange = that.config.pointsTargetRange * that.config.pointsTargetRange;
        that.configOptimized.pointsTargetOffset = that.config.pointsTargetOffset * that.config.pointsTargetOffset;
        that.configOptimized.cursorRadius = that.config.cursorRadius * that.config.cursorRadius;

        that.configOptimized.lineColor = "rgba(" + that.config.lineColor.r + ", " + that.config.lineColor.g + ", " + that.config.lineColor.b + ", " + that.config.lineColor.a +  ")";
    };

    this.spawn = function () {
        var j = 0;
        var i = 0;
        while(true) {
            j = 0;
            var x = i * that.config.pointsStartDistance;
            if(x > that.canvas.width) break;

            while(true) {
                var y = j * that.config.pointsStartDistance;
                if(y > that.canvas.height) break;

                var position = new Vector2(x + Math.randomInt(0, that.config.pointsStartNoise), y + Math.randomInt(0, that.config.pointsStartNoise));
                that.points.push(new Point(position, that));

                j++;
            }
            i++;
        }
    };

    this.clear = function () {
        //that.context.clearRect(0, 0, that.canvas.width, that.canvas.height);
        that.canvas.width = that.canvas.width;
    };

    this.update = function() {
        if(that.config.enableClear) that.clear();
        for(var i = 0; i < that.points.length; i++) {
            that.points[i].update();
        }

        //requestAnimationFrame(that.update);
    };

    this.init = function () {
        if(_options != undefined) that.config = Object.assign(that.config, _options);
        that.setOptimizedConfig();

        that.interval = setInterval(that.update, 30);

        that.fit();
        that.spawn();
        //that.update();
    }();

};

var Point = function (_position, _plexus) {
    var that = this;
    this.app = _plexus;
    this.active = false;
    this.position = _position;
    this.neighbours = [];
    this.target = null;

    this.direction = null;
    this.intervalTime = null;

    this.setNewTarget = function () {

        var appSize = new Vector2(that.app.canvas.width, that.app.canvas.height);
        var offset = that.app.config.targetsBoundsOffset;

        do {
            var newTarget = Vector2.RandomInRange(that.position, that.app.config.pointsTargetRange);
        } while(newTarget.x < 0 - offset || newTarget.y < 0 - offset || newTarget.x > appSize.x + offset || newTarget.y > appSize.y + offset);

        that.target = newTarget;
    };

    this.checkTarget = function () {
        if(that.target == null || Vector2.DistanceFast(that.position, that.target) < that.app.configOptimized.pointsTargetOffset)
            that.setNewTarget();
    };

    this.checkNeighbours = function () {

        var neighboursLength = that.neighbours.length - 1;
        var pointsLength = that.app.points.length;

        // Remove neighbours
        for(var j = neighboursLength; j >= 0; j--) {
            if(Vector2.DistanceFast(that.position, that.neighbours[j].position) > that.app.configOptimized.lineDistance) {
                that.neighbours.splice(j, 1);
            }
        }

        // Check points around
        for(var i = 0; i < pointsLength; i++) {
            if(that.neighbours.indexOf(that.app.points[i]) == -1 && Vector2.DistanceFast(that.position, that.app.points[i].position) < that.app.configOptimized.lineDistance) {
                that.neighbours.push(that.app.points[i]);
            }
        }
    };

    this.drawNeighbourLines = function () {

        that.app.context.strokeStyle = that.app.configOptimized.lineColor;
        that.app.context.beginPath();

        for(var i = 0; i < that.neighbours.length; i++) {
            that.app.context.moveTo(that.position.x, that.position.y);
            that.app.context.lineTo(that.neighbours[i].position.x, that.neighbours[i].position.y);
        }

        that.app.context.stroke();
    };

    this.setDirection = function () {
        var directionVector = (Vector2.VectorTo(that.position, that.target)).Normalize();
        directionVector.Multiply(that.app.config.pointsSpeed);
        that.direction = directionVector;
    };

    this.move = function () {
        that.setDirection();
        that.position.Add( that.direction );
    };

    this.draw = function () {
        that.app.context.beginPath();
        that.app.context.arc(this.position.x, this.position.y, that.app.config.pointsRadius, 0, 2*Math.PI);
        that.app.context.fillStyle = that.app.config.pointsColor;
        that.app.context.fill();
    };

    this.update = function () {
        if(!that.active) return;
        that.checkTarget();
        that.move();
        that.drawNeighbourLines();
        that.draw();
    };

    this.init = function () {
        that.intervalTime = Math.randomInt(500, 1190);
        that.neigboursInterval = setInterval(that.checkNeighbours, that.intervalTime);
        that.directionInterval = setInterval(that.setDirection, that.intervalTime);

        that.active = true;
    };

    setTimeout(that.init, Math.randomInt(0, 500));
};
